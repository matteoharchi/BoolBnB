<template>
    <div>
        <div class="list-group">
            <div class="list-group-item list-group-item-action flex-column align-items-start" v-for="your_transaction in your_transactions" :key="your_transaction.id">
                <div class="d-flex w-100 justify-content-between">
                    <h5 class="pl-0 col-4 mb-0">Sponsorizzazione #{{your_transaction.id}}</h5>
                    <p class="pl-2 col-6 mb-0">{{your_transaction.title}}</p>
                    <p class="pl-3 col-2 mb-0">{{your_transaction.end_date}}</p>
                </div>
                
            </div>
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