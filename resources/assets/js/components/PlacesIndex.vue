<template>
    <div>
        <div class="form-group">
            <router-link :to="{name: 'PlacesCreate'}" class="btn btn-success">Создать новое место</router-link>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">Список добавленных мест</div>
            <div class="panel-body">
                <table class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>Запрос</th>
                        <th>Ответ</th>
                        <th>Время</th>
                        <th width="100">Действия</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="place, index in places">
                        <td>{{ place.api_request }}</td>
                        <td>{{ place.api_response }}</td>
                        <th>{{ place.created_at }}</th>
                        <td>
                            <a href="#" class="btn btn-xs btn-danger"
                               v-on:click.prevent="deleteEntry(place.id, index)">Удалить</a>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data: function () {
            return {
                places: []
            }
        },
        mounted() {
            let app = this;
            axios.get('/api/v1/places')
                .then(function (resp) {
                    app.places = resp.data;
                })
                .catch(function (resp) {
                    alert("Не получилось загрузить сохраненные места");
                });
        },
        methods: {
            deleteEntry(id, index) {
                if (confirm("Действительно удалить это?")) {
                    let app = this;
                    axios.delete('/api/v1/places/' + id)
                        .then(function (resp) {
                            app.places.splice(index, 1);
                        })
                        .catch(function (resp) {
                            alert("Не получилось удалить");
                        });
                }
            }
        }
    }
</script>