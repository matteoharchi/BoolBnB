<template>
    <div>
        <div class="list-group">
            <a href="#" class="list-group-item list-group-item-action flex-column align-items-start" v-for="your_message in your_messages" :key="your_message.id">
                <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-1">{{your_message.object}}</h5>
                </div>
                <p class="mb-1">{{your_message.body}}</p>
            </a>
        </div>  
    </div>
        
    
</template>


<script>
export default {
    props:['your_messages']
}
</script>