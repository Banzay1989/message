<template>
    <div>
        <h3>Форма обратной связи</h3>
        <form>
            <div>
                <input
                    type="text"
                    v-model="name"
                    placeholder="Имя"
                />
            </div>
            <div>
                <input
                    type="tel"
                    v-model="phone"
                    placeholder="Номер телефона"
                />
            </div>
            <div>
                <input
                    type="text"
                    v-model="message"
                    placeholder="Сообщение"
                />
            </div>
            <div>
                <input
                    type="button"
                    value="Отправить"
                    @click="send_form"
                />
            </div>
        </form>
    </div>
</template>

<script>
    export default {
        name: "FormComponent",
        data: () => ({
            name: '',
            phone: '',
            message: '',
        }),

        methods:{
            send_form(){
                axios.get('/form_send', {
                    name: this.name,
                    phone: this.phone,
                    message: this.message,
                })
            }
        }
    }
</script>

<style scoped>
</style>
