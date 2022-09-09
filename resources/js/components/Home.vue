<template>
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Url Shortner</div>

                    <div class="card-body">
                        <div class="alert alert-danger" v-if="error">{{ error }}</div>
                        <form>
                            <b-form-group
                                class="col-6"
                                label="URL"
                                label-for="name"
                            >
                                <b-form-input
                                    id="url"
                                    v-model="url"
                                    placeholder="Please enter your URL"
                                    required
                                />
                            </b-form-group>
                            <div v-if="shorten_url">
                                {{ shorten_url }}
                            </div>
                            <b-form-group>
                                <b-button @click="generateUrl()" class="mt-2">Generate</b-button>
                            </b-form-group>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center mt-5 mb-5">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">URL List</div>
                    <div class="card-body">
                        <b-table responsive striped hover :items="urls"></b-table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    mounted() {
        console.log('Component mounted.')
        this.fetchUrls()
    },

    data() {
        return {
            urls: [],
            url: '',
            api_url: '/api/v1/links',
            shorten_url: '',
            error: ''
        }
    },

    methods: {
        generateUrl() {
                const url = this.url;
                const data = {
                    url: url
                }

                return new Promise((resolve, reject) => {
                    axios.post(this.api_url, data).then((response) => {
                        console.log(response);
                        this.fetchUrls()
                        this.shorten_url = response.data.shorten_url
                        this.error = '';
                        resolve(response);
                    })
                        .catch((error) => {
                            reject(error)
                            this.error = error.response.data.message
                            console.log(error);
                        });
                })
        },

        fetchUrls() {
            return new Promise((resolve, reject) => {
                axios.get(this.api_url).then((response) => {
                    console.log(response);
                    this.urls = response.data
                    resolve(response);
                })
                    .catch((error) => {
                        reject(error)
                        console.log(error);
                    });
            })
        }
    }
}
</script>
