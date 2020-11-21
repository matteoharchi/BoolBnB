<template>
    <div>
        <div class="list-group">
            <a href="#" class="list-group-item list-group-item-action flex-column align-items-start" v-for="your_house in your_houses" :key="your_house.id">
                <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-1">{{your_house.title}}</h5>
                    <div class="icons">
                        <span class="text-muted mr-2"> <a :href="'houses/show/'+your_house.slug"><i class="fas fa-eye"></i></a></span>
                        <span class="text-muted mr-2"> <a :href="'houses/'+your_house.id+'/edit'"><i class="fas fa-edit"></i></a></span>
                        <span class="text-muted mr-2"> <a :href="'houses/'+your_house.id+'/stats'"><i class="fas fa-chart-bar"></i></a></span>
                    </div>
                </div>
                <p class="mb-1">{{your_house.description}}</p>
                
            </a>
        </div>  
    </div>
</template>


<script>
export default {
    props:['your_houses']
    
}
</script>


<style lang="scss" scoped>

</style>