<template>
    <div class="data_strings" id="data_strings">
        <div class="form">
            <div class="alert alert-success" role="alert" v-show="message">{{ message }}</div>
            <div class="alert alert-error" role="alert" v-show="error">{{ error }}</div>

            <form method="post" v-on:submit.prevent="onSubmit">
                <div class="form-group">
                    <input class="form-control" type="text" name="value" v-model="form.value">
                </div>

                <div class="form-group">
                    <button class="btn btn-primary" :disabled="!!loading">Сохранить</button>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
export default {
    props: ['data', 'action'],
    components: {

    },
    data() {
        let data = {value: ''};
        if (this.data) {
            try {
                data = JSON.parse(this.data);
            } catch (e) {
                console.log(e);
            }
        }

        return {
            loading: false,
            form: data,
            message: '',
            error: '',
        }
    },
    mounted() {
        console.log(this.action);
    },
    methods: {
        onSubmit: function(event) {
            const component = this;

            component.$validator.validateAll().then(function() {
                if (component.$validator.errors.any())
                    return false;

                component.loading = true;

                let data = {};
                for (let i in component.form) {
                    data[i] = component.form[i];
                }

                axios.post(component.action, data)
                    .then(function (response) {
                        component.loading = false;
                        component.message = response.data;
                        component.error = null;
                        $('html, body').animate({scrollTop: 0});

                        setTimeout(function() {
                            component.message = '';
                        }, 2000);
                    })
                    .catch(function (error) {
                        component.loading = false;
                        component.error = error.response.data.message || error.response.data || error.message || 'Error';
                    });
            });
        }
    },
}
</script>
