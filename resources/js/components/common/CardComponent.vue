<template>
    <div class="card " :class="this.classes">
        <div class="card-content white-text">
          <span class="card-title">{{this.title}}</span>
          {{this.body}}
          <slot ></slot>
        </div>
        <div class="card-action">
          <slot name="card-links" />
        </div>
    </div>
</template>
<script>
export default {
    props:{
        classes:{
            type:String,
            default:"blue darken-1"
        },
        title:{
            type:String,
            default:"",
            required:true
        },
        body:{
            type:String,
            default:"",
            required:true
        }
    }
}
</script>

