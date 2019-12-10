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
                        :role="header.$attrs.href ? '':'tab'"
                        :data-toggle="header.$attrs.href ? '':'pill'"
                        class="nav-link"
                        :class="{ active: header.$attrs.id === activeTab }"
                        :href="linkable(header.$attrs)"
                        :id="header.$attrs.id"
                        :aria-selected="header.$attrs.id === activeTab"
                        @click="setActiveTab(header.$attrs, $event)"
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
        },
        url:{
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
        setActiveTab(tab, event) {
            this.items.forEach(i => {
                i.isActive = i.$attrs.id === tab.id
            });
        },
        linkable(tab){
            return tab.href || `#${tab.id}`
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
        console.log(this.items)
    }
};
</script>
<style lang="scss">
.nav{
white-space: nowrap;
    display: block!important;
    flex-wrap: nowrap;
    max-width: 100%;
    // overflow-x: scroll;
    overflow-y: hidden;
    
    li {
        display: inline-block
    }
}

.nav::-webkit-scrollbar {
  display: none;
}
</style>
