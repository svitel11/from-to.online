<template>
    <div>

    </div>
</template>
<script>
    //Ixh5buoKutcZstBkTbuQvHpCZetMEfba4TpA1qgX8hyp90M7oVn1op9MId3Hq0mq
    //yftM9nvi7nKSpsIRfix3v1KguHvP9UZaFTNEMTeqkutk5mVhCaaMna7CmvLxJP0i
    import Binance from 'binance-api-node';
    const client = Binance({
        apiKey: 'Ixh5buoKutcZstBkTbuQvHpCZetMEfba4TpA1qgX8hyp90M7oVn1op9MId3Hq0mq',
        apiSecret: 'yftM9nvi7nKSpsIRfix3v1KguHvP9UZaFTNEMTeqkutk5mVhCaaMna7CmvLxJP0i'
    });

    export default {
        name: 'Bot',
        data() {
            return {

            }
        },

        methods: {
            getExchageInfo: function() {
                return new Promise(resolve => {
                    const $response = client.exchangeInfo();
                    setTimeout(function() {
                        return resolve($response)
                    }, 500)
                });
            },

            getAccountInfo: function() {
                return new Promise(resolve => {
                    const $response = client.accountInfo({useServerTime: false});
                    setTimeout(function() {
                        return resolve($response)
                    }, 500)
                });
            },

            getPrices: function() {
                return new Promise(resolve => {
                    const $response = client.prices();
                    setTimeout(function() {
                        return resolve($response)
                    }, 500)
                });
            }
        },

        mounted() {
            this.getAccountInfo().then(response => {
                console.log(response)
            });
        }
    }
</script>
<style scoped>

</style>
