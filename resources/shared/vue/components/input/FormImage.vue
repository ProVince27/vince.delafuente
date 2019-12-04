<template>
    <div class="position-relative image-border">
        <button
            v-show="hasImage "
            @click="handleOnImageRemove"
            class="btn btn-xs btn-remove-section p-0 position-absolute"
            type="button"
            style="top: -16px; right: -16px;"
        >
            <i
                class="far fa-times-circle text-danger"
                style="font-size: 20px;"
            />
        </button>
        <label
             class="mb-0 cursor-pointer centered w-100 h-100"
        >

            <slot :data="image"></slot>

            <div
                v-if="label !== null && !hasImage"
                class="d-flex align-items-center text-gray"
            >
                {{ label }}
            </div>
            
            <input
                ref="file"
                type="file"
                class="invisible position-absolute"
                :accept="accept"
                :name="name"
                @change="handleOnImageChange($event.target.files[0])"
            />
        </label>
    </div>
</template>
<script>
import { default as FormFileInput } from "./FormFileInput";
import { imageMixin, alertMixin } from "mixins";

export default {
    name: "FormImage",
    mixins: [imageMixin, alertMixin],
    props: {
        label: {
            default: "Select an image."
        },
        value: {},
        name: String,
        accept: String,
    },
    data() {
        return {
            image: this.value
        };
    },
    components: {
        FormFileInput
    },
    methods: {
        handleOnImageChange(image) {
            if (!this.isFileImage(image)) {
                return this.toastError("Please select a valid image.");
            }

            this.getImageDataUrl(image)
                .then(base64Image => (this.image = base64Image))
                .then(() => this.$emit("input", this.image))
                .catch(error => {});
        },
        handleOnImageRemove() {
            this.image = null;
            this.$emit("input", null);
        }
    },
    computed: {
        hasImage() {
            return this.image;
        }
    },
};
</script>
<style scoped>
.centered {
    display: flex;
    justify-content: center;
    align-content: center;
}
.image-border {
    border: dashed 2px gray;
}
</style>
