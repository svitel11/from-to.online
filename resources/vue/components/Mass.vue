<template>
    <div>
        <h4 class="title">Mass / Weight Converter</h4>
        <hr class="hr-title"/>
        <div class="row">
            <div class="input-field col s12 l2">
                <input id="from" @change="calculate" @keyup="calculate" type="text" class="validate" v-model="val">
                <label>Quantity</label>
            </div>
            <div class="input-field col s12 l4">
                <div class="select-wrapper">
                    <select id="select-converter" v-model="fromType" @change="calculate">
                        <option class="select-option" :value="null" disabled>From</option>
                        <option v-for="(type, idx) in types"
                                class="select-option"
                                :key="idx"
                                :value="type.abbr">
                            {{type.singular}} ({{type.abbr}})
                        </option>
                    </select>
                </div>
                <label>From</label>
            </div>
            <div class="col s12 l2 swap-form-icon">
                <swap-horizontal-icon :width="25" :height="25"/>
            </div>
            <div class="input-field col s12 l4">
                <div class="select-wrapper">
                    <select id="select-converter" v-model="toType" @change="calculate">
                        <option class="select-option" :value=null disabled>To</option>
                        <option v-for="type in types"
                                class="select-option"
                                :value="type.abbr"
                                :selected="toType == type.abbr">
                            {{type.singular}} ({{type.abbr}})
                        </option>
                    </select>
                </div>
                <label>To</label>
            </div>
            <div class="input-field col s12">
                <input id="to" type="text" disabled class="validate" v-model="res">
                <label>Result</label>
            </div>
        </div>
        <div class="row">
            <div class="col tags">
                <a class="tag" href="#" v-for="link in html" @click="setFromTo(link.from_symbol, link.to_symbol)">{{link.from
                    + ' to '+ link.to}}</a>
            </div>
        </div>
    </div>
</template>
<script>
    var convert = require('convert-units');
    import SwapHorizontalIcon from 'vue-material-design-icons/SwapHorizontal.vue';

    export default {
        name: 'Mass',
        components: {SwapHorizontalIcon},
        data() {
            return {
                types: convert().list('mass'),
                val: 1,
                res: 1,
                fromType: null,
                toType: null,
                html: [],
            }
        },

        methods: {
            calculate: function () {
                if (this.val && this.fromType && this.toType) {
                    this.res = convert(this.val).from(this.fromType).to(this.toType);
                }
            },

            setFromTo: function (f, t) {
                this.fromType = f;
                this.toType = t;
                this.calculate();
            },

            setLinks: function () {
                for (let i = 1; i < this.types.length; i++) {
                    for (let x = i + 1; x < this.types.length; x++) {
                        this.html.push({
                            from: this.types[i].singular,
                            from_symbol: this.types[i].abbr,
                            to: this.types[x].singular,
                            to_symbol: this.types[x].abbr
                        });
                    }
                }
            },
        },

        mounted() {

        },

        created() {
            this.setLinks();
        }
    }
</script>
<style scoped>
    .tags {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-around;
    }

    .tag {
        margin: 5px;
        border: 1px solid #a8d4cc;
        border-radius: 3px;
        padding: 5px;
    }
</style>
