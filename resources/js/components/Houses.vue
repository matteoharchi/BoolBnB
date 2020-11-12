<template>
    <div>
        <div class="list-group">
            <a href="#" class="list-group-item list-group-item-action flex-column align-items-start" v-for="your_house in your_houses" :key="your_house.id">
                <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-1">{{your_house.title}}</h5>
                    <div class="icons">
                        <span class="text-muted mr-2"> <a :href="route_home"><i class="fas fa-eye"></i></a></span>
                        <span class="text-muted mr-2"> <a><i class="fas fa-edit"></i></a></span>
                        <span class="text-muted mr-2"> <a><i class="fas fa-trash-alt"></i></a> </span>
                    </div>
                </div>
                <p class="mb-1">{{your_house.description}}</p>
                <small class="text-muted">Donec id elit non mi porta.</small>
            </a>
        </div>  
    </div>
</template>


<script>
export default {
    props:['your_houses','route_home']
    
}
</script>


<style lang="scss" scoped>

</style>