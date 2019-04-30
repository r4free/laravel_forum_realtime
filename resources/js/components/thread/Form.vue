<template>
    <div class="row">
        <form class="col s12" @submit.prevent="submit">
            <div class="row">
                <div class="input-field col s12">
                    <input placeholder="" id="title" type="text" class="validate" v-model="thread.title">
                    <label for="title">{{titleText}}</label>
                </div>
                <div class="input-field col s12">
                    <!--<i class="material-icons prefix">mode_edit</i>-->
                    <textarea id="icon_prefix2" class="materialize-textarea" v-model="thread.body"></textarea>
                    <label for="icon_prefix2">{{bodyText}}</label>
                </div>
                <div class="col s12">
                    <button class="btn waves-effect waves-light" type="submit" name="action" >
                        <!--<i class="material-icons right">send</i>-->
                        {{translate.subm}}
                    </button>
                </div>
            </div>
        </form>
    </div>
</template>
<script>
    import propsTexts from './propsText'
    export default {
        props: {
           propsTexts
        },
        data() {
            return {
                thread: {
                    title: '',
                    body: ''
                }
            }
        },
        methods: {
            submit() {
                axios.post('thread', this.thread).then(response => {
                    this.resetForm();
                    this.$emit('submit');
                })

            },
            resetForm(){
                this.thread.title = '';
                this.thread.body = ''
            }
        },
        mounted(){
            console.log(this.parent)
        }
    }
</script>

