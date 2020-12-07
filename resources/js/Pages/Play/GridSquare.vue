<template>
    <div
        tabindex="0"
        class="flex flex-col items-center justify-center w-16 h-16 p-1 overflow-hidden border select-none focus:outline-none"
        :class="[active ? 'bg-blue-100 border-2 border-blue-500' : 'bg-white']"
        @click="handleClick"
        @click.right="handleClick"
        @mousemove="handleMouseDrag"
        @click.right.prevent="startEditing"
        @keydown.delete="reset"
        @keydown.enter="active = !active"
        @keydown.up="console.log('called')"
    >
        <div
            v-if="top && !editing && !value"
            class="mb-auto text-sm text-green-500"
        >
            {{ top }}
        </div>
        <input
            type="text"
            class="w-full p-1 text-lg bg-blue-100 focus:outline-none cursor"
            v-model="numberInput"
            v-show="editing"
            @keydown.enter="setValue"
            @keydown.esc="
                editing = false;
                active = false;
            "
            ref="numbersInput"
        />
        <div v-if="middle && !editing && !value" class="text-sm text-blue-400">
            {{ middle }}
        </div>
        <div v-if="value && !editing" class="text-3xl text-blue-500">
            {{ value }}
        </div>
        {{ position }}
    </div>
</template>

<script>
export default {
    props: ["mode", "position"],
    data() {
        return {
            numberInput: "",
            active: "",
            value: "",
            middle: "",
            top: "",
            editing: false
        };
    },
    methods: {
        startEditing() {
            this.setActive();
            this.editing = true;

            this.$nextTick(function() {
                this.$refs.numbersInput.focus();
            });
        },
        setValue() {
            if (this.mode === "normal") {
                this.value = this.numberInput;
                this.top = "";
                this.middle = "";
            } else if (this.mode === "top") {
                this.top = this.numberInput;
                this.value = "";
                this.middle = "";
            } else {
                this.middle = this.numberInput;
                this.top = "";
                this.value = "";
            }

            this.editing = false;
            this.active = false;
        },
        setActive() {
            eventBus.$emit("resetActive");
            this.active = true;
            this.editing = false;
        },
        resetEdit() {
            this.editing = false;
        },
        resetActive() {
            this.active = false;
        },
        handleClick(e) {
            if (e.buttons === 0) {
                this.active = !this.active;
                if (this.active === false) {
                    this.editing = false;
                }
            } else {
                eventBus.$emit("resetActive");
                this.active = true;
                this.editing = true;
            }
        },
        handleMouseDrag(e) {
            if (e.buttons == 1) {
                this.active = true;
            }
        },
        reset() {
            this.value = "";
            this.middle = "";
            this.top = "";
            this.editing = false;
            this.active = false;
        }
    },
    created() {
        eventBus.$on("resetActive", e => {
            this.resetEdit();
            this.resetActive();
        });
    }
};
</script>

<style></style>
