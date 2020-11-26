<template>
    <div>
        <div class="list-group">
            <a href="#" class="list-group-item list-group-item-action flex-column align-items-start" v-for="your_message in your_messages" :key="your_message.id">
                <div class="d-flex w-100 justify-content-between">
                    <!-- <span>{{your_message.sender_mail}}</span>
                    <span><strong>{{your_message.object}}</strong></span>
                    <span>{{your_message.body.substr(0,90)}}</span> -->

                    <table>
                        <td class="col-4">{{your_message.sender_mail}}</td>
                        <td class="col-3"><strong>{{your_message.object}}</strong></td>
                        <td class="col-4 text-muted">{{your_message.body.substr(0,50)}}</td>
                        <td class="col-1 text-muted">{{your_message.created_at}}</td>
                    </table>
                </div>
            </a>
        </div>  
    </div>
        
    
</template>


<script>
export default {
    props:['your_messages']
}
</script>