<template>
    <div class="border-2 ">
        <div v-for="(row, i) in gridValue" :key="i">
            <div class="flex">
                <div v-for="(square, s) in row" :key="s" class="flex w-16 h-16">
                    <grid-sqaure
                        :mode="mode"
                        :position="positions[s]"
                    ></grid-sqaure>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import GridSqaure from "./GridSquare.vue";
export default {
    components: { GridSqaure },
    props: ["mode", "positions"],
    data() {
        return {
            gridValue: [
                [null, null, null],
                [null, null, null],
                [null, null, null]
            ]
        };
    }
};
</script>

<style></style>
