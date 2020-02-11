<template>
    <div>
        <h4 class="title">Data Storage Converter</h4>
        <hr class="hr-title"/>
        <div class="row">
            <div class="input-field col s5">
                <input id="from" @change="calculate" @keyup="calculate" type="text" class="validate" v-model="val">
                <label>Value</label>
            </div>
            <div class="col s2 swap-form-icon">
                <swap-horizontal-icon :width="25" :height="25"/>
            </div>
            <div class="input-field col s5">
                <input id="to" type="text" disabled class="validate" v-model="res">
                <label>Output</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s6">
                <select v-model="fromType" @change="calculate">
                    <option :value=null disabled>From</option>
                    <option v-for="(type, idx) in types" :key="idx" :value="type" >{{type}}</option>
                </select>
                <label>Data Type Select</label>
            </div>
            <div class="input-field col s6">
                <select v-model="toType" @change="calculate">
                    <option :value=null disabled>To</option>
                    <option v-for="(type, idx) in types" :key="idx" :value="type" >{{type}}</option>
                </select>
                <label>Data Type Select</label>
            </div>
        </div>
        <div class="row">
            <div class="col tags">
                <a class="tag" href="#" v-for="link in html" @click="setFromTo(link.from, link.to)">{{link.from + ' to '+ link.to}}</a>
            </div>
        </div>
    </div>
</template>
<script>
    import SwapHorizontalIcon from 'vue-material-design-icons/SwapHorizontal.vue';
    export default {
        name: 'Datesize',
        components: {
            SwapHorizontalIcon
        },
        data() {
            return {
                val: 1,
                res: 1,
                fromType: null,
                toType: null,
                types: [
                    'Bit',
                    'Byte',
                    'Kilobit',
                    'Kilobyte',
                    'Megabit',
                    'Megabyte',
                    'Gigabit',
                    'Gigabyte',
                    'Terabit',
                    'Terabyte',
                    'Petabit',
                    'Petabyte'
                ],
                sizes: {
                    'Bit': {
                        'Bit': 1,
                        'Byte': 0.125,
                        'Kilobit': 0.0009765625,
                        'Kilobyte': 0.0001220703125,
                        'Megabit': 9.536743164063E-7,
                        'Megabyte': 1.192092895508E-7,
                        'Gigabit': 9.313225746155E-10,
                        'Gigabyte': 1.164153218269E-10,
                        'Terabit': 9.094947017729E-13,
                        'Terabyte': 1.136912032962E-13,
                        'Petabit': 8.881784160621E-16,
                        'Petabyte': 2.953157760203E-10
                    },
                    'Byte': {
                        'Bit': 8,
                        'Byte': 1,
                        'Kilobit': 0.0078125,
                        'Kilobyte': 0.0009765625,
                        'Megabit': 0.00000762939453125,
                        'Megabyte': 9.536743164063E-7,
                        'Gigabit': 7.450580596924E-9,
                        'Gigabyte': 9.313225746155E-10,
                        'Terabit': 7.275957614183E-12,
                        'Terabyte': 9.095296263695E-13,
                        'Petabit': 7.105427328497E-15,
                        'Petabyte': 2.362526208162E-9
                    },
                    'Kilobit': {
                        'Bit': 1024,
                        'Byte': 128,
                        'Kilobit': 1,
                        'Kilobyte': 0.125,
                        'Megabit': 0.0009765625,
                        'Megabyte': 0.0001220703125,
                        'Gigabit': 9.536743164063E-7,
                        'Gigabyte': 1.192092895508E-7,
                        'Terabit': 9.313225746155E-10,
                        'Terabyte': 1.164197921753E-10,
                        'Petabit': 9.094946980476E-13,
                        'Petabyte': 3.024033546448E-7
                    },
                    'Kilobyte': {
                        'Bit': 8192,
                        'Byte': 1024,
                        'Kilobit': 8,
                        'Kilobyte': 1,
                        'Megabit': 0.0078125,
                        'Megabyte': 0.0009765625,
                        'Gigabit': 0.00000762939453125,
                        'Gigabyte': 9.536743164063E-7,
                        'Terabit': 7.450580596924E-9,
                        'Terabyte': 9.313583374023E-10,
                        'Petabit': 7.275957584381E-12,
                        'Petabyte': 0.000002419226837158
                    },
                    'Megabit': {
                        'Bit': 1048576,
                        'Byte': 131072,
                        'Kilobit': 1024,
                        'Kilobyte': 128,
                        'Megabit': 1,
                        'Megabyte': 0.125,
                        'Gigabit': 0.0009765625,
                        'Gigabyte': 0.0001220703125,
                        'Terabit': 9.536743164063E-7,
                        'Terabyte': 1.192138671875E-7,
                        'Petabit': 9.313225708008E-10,
                        'Petabyte': 0.0003096610351563
                    },
                    'Megabyte': {
                        'Bit': 8388608,
                        'Byte': 1048576,
                        'Kilobit': 8192,
                        'Kilobyte': 1024,
                        'Megabit': 8,
                        'Megabyte': 1,
                        'Gigabit': 0.0078125,
                        'Gigabyte': 0.0009765625,
                        'Terabit': 0.00000762939453125,
                        'Terabyte': 9.537109375E-7,
                        'Petabit': 7.450580566406E-9,
                        'Petabyte': 0.00247728828125
                    },
                    'Gigabit': {
                        'Bit': 1073741824,
                        'Byte': 134217728,
                        'Kilobit': 1048576,
                        'Kilobyte': 131072,
                        'Megabit': 1024,
                        'Megabyte': 128,
                        'Gigabit': 1,
                        'Gigabyte': 0.125,
                        'Terabit': 0.0009765625,
                        'Terabyte': 0.000122075,
                        'Petabit': 9.536743125E-7,
                        'Petabyte': 0.3170929
                    },
                    'Gigabyte': {
                        'Bit': 8589934592,
                        'Byte': 1073741824,
                        'Kilobit': 8388608,
                        'Kilobyte': 1048576,
                        'Megabit': 8192,
                        'Megabyte': 1024,
                        'Gigabit': 8,
                        'Gigabyte': 1,
                        'Terabit': 0.0078125,
                        'Terabyte': 0.0009766,
                        'Petabit': 0.0000076293945,
                        'Petabyte': 2.5367432
                    },
                    'Terabit': {
                        'Bit': 1099511627776,
                        'Byte': 137438953472,
                        'Kilobit': 1073741824,
                        'Kilobyte': 134217728,
                        'Megabit': 1048576,
                        'Megabyte': 131072,
                        'Gigabit': 1024,
                        'Gigabyte': 128,
                        'Terabit': 1,
                        'Terabyte': 0.1250048,
                        'Petabit': 0.000976562496,
                        'Petabyte': 324.7031296
                    },
                    'Terabyte': {
                        'Bit': 8795755265206,
                        'Byte': 1099469408151,
                        'Kilobit': 8589604751.178,
                        'Kilobyte': 1073700593.897,
                        'Megabit': 8388285.889822,
                        'Megabyte': 1048535.736228,
                        'Gigabit': 8191.685439279,
                        'Gigabyte': 1023.96067991,
                        'Terabit': 7.999692811796,
                        'Terabyte': 1,
                        'Petabit': 0.007812199979521,
                        'Petabyte': 2597.525291829
                    },
                    'Petabit': {
                        'Bit': 1125899911454000,
                        'Byte': 140737488931800,
                        'Kilobit': 1099511632280,
                        'Kilobyte': 137438954034.9,
                        'Megabit': 1073741828.398,
                        'Megabyte': 134217728.5498,
                        'Gigabit': 1048576.004295,
                        'Gigabyte': 131072.0005369,
                        'Terabit': 1024.000004194,
                        'Terabyte': 128.0049157243,
                        'Petabit': 1,
                        'Petabyte': 332496.0060723
                    },
                    'Petabyte': {
                        'Bit': 3386205821.701,
                        'Byte': 423275727.7126,
                        'Kilobit': 3306841.622755,
                        'Kilobyte': 413355.2028443,
                        'Megabit': 3229.337522221,
                        'Megabyte': 403.6671902777,
                        'Gigabit': 3.153649924044,
                        'Gigabyte': 0.3942062405055,
                        'Terabit': 0.00307973625395,
                        'Terabyte': 0.0003849818144777,
                        'Petabit': 0.000003007554923179,
                        'Petabyte': 1
                    }
                },
                html: []
            }
        },

        methods: {
            setFromType: function(type) {
                this.fromType = type;
            },

            calculate: function() {
                if (this.fromType === null || this.toType === null) return;
                this.res = this.val * this.sizes[this.fromType][this.toType]
            },

            setLinks: function() {
                for (let i = 0; i < this.types.length; i++) {
                    for (let x = i + 1; x < this.types.length; x++) {
                        this.html.push({from: this.types[i], to: this.types[x]});
                    }
                }
            },

            setFromTo: function(f, t) {
                this.fromType = f;
                this.toType = t;
                this.calculate();
            }
        },

        mounted() {
            M.AutoInit();
            this.setLinks();
        }
    }
</script>
<style scoped>
    .swap-form-icon {
        display: flex;
        justify-content: center;
        align-items: self-end;
        height: 54px;
    }

    .title {
        font-family: 'Poiret One', cursive;
    }

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
