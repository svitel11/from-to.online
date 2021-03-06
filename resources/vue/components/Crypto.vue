<template>
    <div>
        <h4 class="title">Crypto Market Cap & Converter</h4>
        <hr class="hr-title"/>
        <div class="row">
            <div class="col s12 convert-form">
                <div class="input-field col s12 l2">
                    <input id="from" @keyup="getPriceForPair" v-model="from_val" type="text" class="validate">
                </div>
                <div class="input-field col s12 l5">
                    <input @keyup="setCoinFrom" id="from_coin" v-model="from_coin" type="text" class="validate"
                           placeholder="e.g.: BTC">
                    <div v-if="coinFromListFrom.length > 0" class="dropdown-search dropdown-show">
                        <a class="dropdown-search-item" v-for="c in coinFromListFrom">
                            <div @click="setFrom(c.id)" class="dropdown-item-text">{{c.name}} - {{c.symbol}}</div>
                        </a>
                    </div>
                </div>
                <div class="col s12 l2 swap-form-icon">
                    <swap-horizontal-icon :width="25" :height="25"/>
                </div>
                <div class="input-field col s12 l3">
                    <input @keyup="setCoinTo" @click="coinFromListTo = supportedCoins" id="to_coin" v-model="to_coin"
                           type="text" class="validate" placeholder="e.g.: usd">
                    <div v-if="coinFromListTo.length > 0" class="dropdown-search dropdown-show">
                        <a class="dropdown-search-item" v-for="c in coinFromListTo">
                            <div @click="setTo(c)" class="dropdown-item-text">{{c}}</div>
                        </a>
                    </div>
                </div>
                <div class="input-field col s12 m6 l4">
                    <input id="to" v-model="to_val" disabled type="text" class="validate">
                </div>
            </div>
        </div>
        <hr>
        <div class="table-coins" v-if="coins.length > 0">
            <table class="table table-responsive">
                <thead>
                <tr>
                    <th>Rank</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Market Cap</th>
                    <th>Volume</th>
                    <th>Circulating Supply</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="(coin, idx) in coins">
                    <td>{{idx + 1}}</td>
                    <td style="display: flex">
                        <img :src="coin.image.small" :alt="coin.name" height="20px" style="margin-right: 5px">{{coin.name}}
                    </td>
                    <td>{{formatNumber('$', coin.market_data.current_price.usd)}}</td>
                    <td>{{formatNumber('$', coin.market_data.market_cap.usd)}}</td>
                    <td>{{formatNumber('$', coin.market_data.total_volume.usd)}}</td>
                    <!--<td>{{format({prefix: '$'})(coin.market_data.total_volume.usd))}}</td>-->
                    <td>{{formatNumber('', coin.market_data.total_supply)}}</td>
                </tr>
                </tbody>
            </table>
        </div>
        <div class="progress" v-else>
            <div class="indeterminate"></div>
        </div>
    </div>
</template>
<script>
    const CoinGecko = require('coingecko-api');
    const CoinGeckoClient = new CoinGecko();
    import SwapHorizontalIcon from 'vue-material-design-icons/SwapHorizontal.vue';

    const format = require('format-number');

    export default {
        name: 'Cryptomarketcap',
        components: { SwapHorizontalIcon },
        data() {
            return {
                coins: [],
                coinsList: [],
                from_coin: null,
                to_coin: null,
                from_val: 1,
                to_val: 1,
                coinFromListFrom: [],
                coinFromListTo: [],
                supportedCoins: [
                    "btc",
                    "eth",
                    "ltc",
                    "bch",
                    "bnb",
                    "eos",
                    "xrp",
                    "xlm",
                    "usd",
                    "aed",
                    "ars",
                    "aud",
                    "bdt",
                    "bhd",
                    "bmd",
                    "brl",
                    "cad",
                    "chf",
                    "clp",
                    "cny",
                    "czk",
                    "dkk",
                    "eur",
                    "gbp",
                    "hkd",
                    "huf",
                    "idr",
                    "ils",
                    "inr",
                    "jpy",
                    "krw",
                    "kwd",
                    "lkr",
                    "mmk",
                    "mxn",
                    "myr",
                    "nok",
                    "nzd",
                    "php",
                    "pkr",
                    "pln",
                    "rub",
                    "sar",
                    "sek",
                    "sgd",
                    "thb",
                    "try",
                    "twd",
                    "uah",
                    "vef",
                    "vnd",
                    "zar",
                    "xdr",
                    "xag",
                    "xau"
                ]
            }
        },

        methods: {
            getPing: async function () {
                let data = await CoinGeckoClient.ping();
            },

            getCoins: async function () {
                let coins = await CoinGeckoClient.coins.all();
                this.coins = coins.data;
            },

            getCoinsList: async function () {
                let coins = await CoinGeckoClient.coins.list();
                this.coinsList = coins.data;
            },

            formatNumber: function (prefix, number) {
                return format({prefix: prefix})(number, {noSeparator: false});
            },

            setCoinFrom: function () {
                if (this.from_coin.length < 2) return;
                this.coinFromListFrom = [];
                const _this = this;
                this.coinsList.map(function (c) {
                    if (c.name.toLowerCase().indexOf(_this.from_coin.toLowerCase()) !== -1 || c.symbol.toLowerCase().indexOf(_this.from_coin.toLowerCase()) !== -1) {
                        _this.coinFromListFrom.push(c);
                    }
                });
            },

            setCoinTo: function () {
                this.coinFromListTo = [];
                const _this = this;
                this.supportedCoins.map(function (c) {
                    if (c.toLowerCase().indexOf(_this.to_coin.toLowerCase()) !== -1) {
                        _this.coinFromListTo.push(c);
                    }
                });
            },

            setFrom: function (coin) {
                this.from_coin = coin;
                this.coinFromListFrom = [];
                this.getPriceForPair();
            },

            setTo: function (coin) {
                this.to_coin = coin.toLowerCase();
                this.coinFromListTo = [];
                this.getPriceForPair();
            },

            getPriceForPair: async function () {
                if (this.from_val === "" || this.from_coin === "" || this.from_coin === null || this.to_coin === "" || this.to_coin === null) return;
                //let params = {this.from_coin, this.to_coin};
                let data = await CoinGeckoClient.simple.price({ids: this.from_coin, vs_currencies: this.to_coin});
                this.to_val = this.formatNumber('', data.data[this.from_coin][this.to_coin] * this.from_val);
            },

            makeMeta: function () {
                let meta = "";
                this.supportedCoins.map(coin => {
                    meta += "trx to " + coin + ", ";
                });
                console.log(meta);
            }
        },

        mounted() {
            this.getCoinsList();
            //this.makeMeta();
        },

        created() {
            this.getCoins();
        }
    }
</script>
<style scoped>
    .table-coins {
        overflow-x: scroll;
    }

    /* width */
    ::-webkit-scrollbar {
        width: 5px;
    }

    /* Track */
    ::-webkit-scrollbar-track {
        background: #f1f1f1;
    }

    /* Handle */
    ::-webkit-scrollbar-thumb {
        background: #888;
    }

    /* Handle on hover */
    ::-webkit-scrollbar-thumb:hover {
        background: #555;
    }
</style>
