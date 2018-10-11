<template>
    <div>
        <div class="form-group">
            <router-link to="/" class="btn btn-default">Назад к списку</router-link>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">Создать новое место</div>
            <div class="panel-body">
                <vue-bootstrap-typeahead
                        class="mb-4"
                        v-model="query"
                        :minMatchingChars="3"
                        :maxMatches="6"
                        :data="places"
                        :serializer="place => place.description"
                        @hit="selectedPlace = $event"
                        placeholder="Введите название места"
                />
                <button v-on:click.prevent="saveForm" class="btn btn-success">Добавить в базу</button>
                <div class="alert-success" v-if="selectedPlace"><strong>Вы выбрали:</strong> {{ selectedPlace }}</div>

            </div>
        </div>
    </div>
</template>

<script>
    import VueBootstrapTypeahead from 'vue-bootstrap-typeahead';

    export default {
        components: {
            VueBootstrapTypeahead
        },
        data: function () {
            return {
                query: '',
                selectedPlace: null,
                places: []
            }
        },
        methods: {
            saveForm() {

                let newPlace = {
                    api_response: this.selectedPlace,
                    api_request: this.query
                }
                axios.post('/api/v1/places', newPlace)
                    .then((resp) => {
                        console.log(resp);
                        this.$router.push({path: '/'});
                    })
                    .catch((resp) => {
                        console.log(resp);
                        alert("Ошибка сохранения!");
                    });
            },
        },
        watch: {
            query(newQuery) {
                if (newQuery.length > 2) {
                    axios.get(`/api/v1/find/${newQuery}`)
                        .then((res) => {
                            this.places = res.data.predictions
                        })
                }
            }
        },
        filters: {
            stringify(value) {
                return JSON.stringify(value, null, 2)
            }
        }
    }
</script>