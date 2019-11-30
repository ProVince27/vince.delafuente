<template>
	<div class="star-indicator-container" :id="id" v-bind:class="{ 'bad-rate': value <= 2 && value !== null && !disableColorInidication, 'star-indicator-color': !disableColorInidication }">
		<i class="fa star-one" v-bind:class="{ 'fa-star': value >= 1, 'fa-star-o': value < 1, 'fa-star-half-o': value < 1 && value > 0 }"></i>
		<i class="fa star-two" v-bind:class="{ 'fa-star': value >= 2, 'fa-star-o': value < 2, 'fa-star-half-o': value < 2 && value > 1 }"></i>
		<i class="fa star-three" v-bind:class="{ 'fa-star': value >= 3, 'fa-star-o': value < 3, 'fa-star-half-o': value < 3 && value > 2 }"></i>
		<i class="fa star-four" v-bind:class="{ 'fa-star': value >= 4, 'fa-star-o': value < 4, 'fa-star-half-o': value < 4 && value > 3 }"></i>
		<i class="fa star-five" v-bind:class="{ 'fa-star': value >= 5, 'fa-star-o': value < 5, 'fa-star-half-o': value < 5 && value > 4 }"></i>
	</div>
</template>
<style scoped>
	.star-indicator-color > i {
		color: #ffd700;
	}
	.star-indicator-color.bad-rate > i {
		color: #d12c06;
	}
</style>
<script>
	export default {
        name:'StartIndicator',
		props: {
			id: {
				type: String,
				required: false,
				default: "star-indicator"
			},
			value: {
				default: 0,
				type: Number,
				required: false,
			},
			disableColorInidication: {
				type: Boolean,
				default: false,
				required: false,
			}
		}
	}
</script>