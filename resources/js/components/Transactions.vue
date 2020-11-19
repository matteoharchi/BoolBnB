<template>
    <div>
        <div class="list-group">
            <a href="#" class="list-group-item list-group-item-action flex-column align-items-start" v-for="your_transaction in your_transactions" :key="your_transaction.id">
                <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-1">Sponsorizzazione {{your_transaction.id}}</h5>
                </div>
                <p class="mb-1"></p>
                <small class="text-muted">Donec id elit non mi porta.</small>
            </a>
        </div>  
    </div>
</template>


<script>
export default {
    props:['your_transactions']
    
}
</script>


<style lang="scss" scoped>

</style>