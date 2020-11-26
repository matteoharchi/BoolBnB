<template>
    <div>
        <div class="list-group">
            <a href="#" class="list-group-item list-group-item-action flex-column align-items-start" v-for="your_house in your_houses" :key="your_house.id">
                <div class="d-flex w-100 justify-content-between">
                    <p class=" house-name pt-3">{{your_house.title}}</p>
                    <div class="icons">
                        <span class="text-muted mr-2" title="Mostra"> <a class="btn btn-outline-danger mt-2" :href="'houses/show/'+your_house.slug"><i class="fas fa-eye"> </i> <span>Mostra</span> </a></span>
                        <span class="text-muted mr-2" title="Modifica"> <a class="btn btn-outline-danger mt-2" :href="'houses/'+your_house.id+'/edit'"><i class="fas fa-edit"> </i> <span>Modifica</span> </a></span>
                        <span class="text-muted mr-2" title="Statistiche"> <a class="btn btn-outline-danger mt-2" :href="'houses/'+your_house.id+'/stats'"><i class="fas fa-chart-bar"></i> <span>Statistiche</span> </a></span>
                    </div>
                </div>
                
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
.btn-outline-danger {
    
    color: #ff385c;
    border-color: #ff385c;
    @media (max-width: 767px) {
        span{
            display: none;
        }
    }
}
.btn-outline-danger:hover{
    color: white;
    background-color: #ff385c;
    border-color: #ff385c;
}

</style>