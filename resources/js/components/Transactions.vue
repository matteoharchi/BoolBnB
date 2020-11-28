<template>
    <div>
        <div class="list-group">
            <div class="list-group-item list-group-item-action flex-column align-items-start" v-for="your_transaction in your_transactions" :key="your_transaction.id">
                <div class="d-flex w-100 justify-content-between">
                    <p class="col-4 pl-0 mb-0">Sponsor #{{your_transaction.id}}</p>
                    <p class="col-5 pl-2 pr-0 mb-0 col-lg-5 pl-lg-0">{{your_transaction.title}}</p>
                    <p class="col-3 pl-0 mb-0 col-lg-3 pl-lg-4">{{your_transaction.end_date}}</p>
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