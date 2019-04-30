<template>

</template>
<script>
    export default {
        props:{
            texts:{
                type:Object
            }
        },
        created(){
            window.translate = this.texts
        }
    }
</script>
