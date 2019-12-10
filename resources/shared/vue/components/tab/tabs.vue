<template>
    <div :class="['card', variant, 'card-outline card-outline-tabs']">
        <div class="card-header p-0 border-bottom-0">
            <ul class="nav nav-tabs" role="tablist">
                <li
                    class="nav-item"
                    v-for="(header, i) in items"
                    :key="uuid(i)"
                >
                    <a
                        role="tab"
                        data-toggle="pill"
                        class="nav-link"
                        :class="{ active: header.$attrs.id === activeTab }"
                        :href="`#${header.$attrs.id}`"
                        :id="header.$attrs.id"
                        :aria-selected="header.$attrs.id === activeTab"
                        @click="setActiveTab(header.$attrs.id, $event)"
                    >
                        {{ header.$attrs.name }}
                    </a>
                    <slot name="header"></slot>
                </li>
            </ul>
        </div>
        <div class="card-body">
            <slot />
        </div>
    </div>
</template>
<script>
export default {
    name: "tabs",
    props: {
        activeTab: null,
        variant: {
            default: "card-primary"
        },
        tabs: {
            default:null
        }
    },
    data() {
        return {
            items: [],
            activated: null
        };
    },
    methods: {
        setActiveTab(id, event) {
            this.items.forEach(i => {
                i.isActive = i.$attrs.id === id;
            });
        }
    },
    mounted() {
        
        if (this.tabs !== null && this.tabs.length > 0) {
            this.$children[0].isActive = true
            this.tabs.forEach(i => {
                this.items.push({ '$attrs':i })
            })
        }
        
        /* if it has children */
        if (this.tabs === null && this.$children.length > 0) {
            this.$children.forEach(i => {
                i.isActive = i.$attrs.id === this.activeTab;
                this.items.push(i);
            });
        }
    }
};
</script>
