<template>
    <div
        class="flex items-center justify-center w-screen h-screen p-16 text-sm bg-gray-800"
    >
        <div class="flex p-4 overflow-y-scroll bg-white rounded w-xl h-md ">
            <div>
                <div class="rounded">
                    <div class="flex border-t border-l border-r rounded-t">
                        <div>
                            <sub-square
                                :mode="mode"
                                :positions="getPositions(1)"
                            ></sub-square>
                        </div>
                        <div>
                            <sub-square
                                :mode="mode"
                                :positions="getPositions(2)"
                            ></sub-square>
                        </div>
                        <div>
                            <sub-square
                                :mode="mode"
                                :positions="getPositions(3)"
                            ></sub-square>
                        </div>
                    </div>
                    <div class="flex border-l border-r">
                        <div>
                            <sub-square
                                :mode="mode"
                                :positions="getPositions(4)"
                            ></sub-square>
                        </div>
                        <div>
                            <sub-square
                                :mode="mode"
                                :positions="getPositions(5)"
                            ></sub-square>
                        </div>
                        <div>
                            <sub-square
                                :mode="mode"
                                :positions="getPositions(6)"
                            ></sub-square>
                        </div>
                    </div>
                    <div class="flex border-b border-l border-r rounded-b">
                        <div>
                            <sub-square
                                :mode="mode"
                                :positions="getPositions(7)"
                            ></sub-square>
                        </div>
                        <div>
                            <sub-square
                                :mode="mode"
                                :positions="getPositions(8)"
                            ></sub-square>
                        </div>
                        <div>
                            <sub-square
                                :mode="mode"
                                :positions="getPositions(9)"
                            ></sub-square>
                        </div>
                    </div>
                </div>
            </div>
            <div class="p-4 mx-auto text-center">
                <div class="text-xl underline">Modes</div>
                <div class="flex flex-col mt-2 space-y-4">
                    <button
                        class="block p-2 text-lg text-white bg-blue-500 rounded hover:bg-blue-700"
                        @click="mode = 'normal'"
                    >
                        Normal
                    </button>
                    <button
                        class="block p-2 text-lg text-white bg-blue-500 rounded hover:bg-blue-700"
                        @click="mode = 'top'"
                    >
                        Top
                    </button>
                    <button
                        class="block p-2 text-lg text-white bg-blue-500 rounded hover:bg-blue-700"
                        @click="mode = 'middle'"
                    >
                        Middle
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import SubSquare from "./SubSquare";
export default {
    components: { SubSquare },
    data() {
        return {
            mode: "normal",
            activeSquare: "",
            squareValues: [],
            selectedAddress: "",
            grid: null
        };
    },
    methods: {
        getPositions(group) {
            return this.grid[group];
        },
        // getPosition(cell) {
        //     return this.grid
        //         .map((row, i) => {
        //             if (row.includes(cell)) {
        //                 return [row.indexOf(cell), i];
        //             }
        //         })
        //         .filter(value => {
        //             return value !== undefined;
        //         });
        // },
        createGrid(lengthX, lengthY) {
            const map = Array.from({ length: lengthX }, (_, colIndex) =>
                Array.from({ length: lengthY }, (_, rowIndex) =>
                    // some element to put in each, for example
                    [colIndex, rowIndex]
                )
            );
            return map;
        }
    },
    created() {
        this.grid = this.createGrid(9, 9);
    }
};
</script>

<style></style>
