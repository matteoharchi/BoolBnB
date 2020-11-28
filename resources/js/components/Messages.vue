<template>
    <div>
        <div class="list-group">
            <a href="#" class="list-group-item list-group-item-action flex-column align-items-start pl-0 pr-0 pr-sm-0" v-for="your_message in your_messages" :key="your_message.id">
                <div class="d-flex w-100 justify-content-between">
                    <!-- <span>{{your_message.sender_mail}}</span>
                    <span><strong>{{your_message.object}}</strong></span>
                    <span>{{your_message.body.substr(0,90)}}</span> -->

                   
                        <td class="col-4 pl-1 col-sm-4 pl-sm-3 col-lg-4 pr-0">{{your_message.sender_mail.substr(0,your_message.sender_mail.indexOf('@'))}}</td>
                        <td class="col-6 pl-0 col-sm-3 pl-sm-0 col-lg-3"><strong>{{your_message.object}}</strong></td>
                        <td class="col-0 col-sm-3 pl-sm-0 col-lg-3 text-muted message-body">{{your_message.body.substr(0,50)}}...</td>
                        <td class="col-2 pl-0 col-sm-2 pl-sm-0 col-lg-2 text-muted">{{your_message.title}}</td>
                    
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

<style lang="scss" scoped>
    table{
        table-layout: fixed;
        word-wrap: break-word;
    }
    @media (max-width: 767px){
        *{
            font-size: 12px;
        }
        .message-body{
            display: none;
        }
    }
</style>