<template>
    <div>
        <div class="form-group">
            <router-link :to="{name: 'createNews'}" class="btn btn-success">Create new news</router-link>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">Companies list</div>
            <div class="panel-body">
                <table class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>type</th>
                        <th>views</th>
                        <th>order</th>
                        <th>active</th>
                        <th width="100">&nbsp;</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="item, index in news">
                        <td>{{ item.id }}</td>
                        <td>{{ item.title }}</td>
                        <td>{{ item.type }}</td>
                        <td>{{ item.views }}</td>
                        <td>{{ item.order }}</td>
                        <td>{{ item.active }}</td>
                        <td>
                            <router-link :to="{name: 'editNews', params: {id: item.id, news: item}}" class="btn btn-xs btn-default">
                                Edit
                            </router-link>
                            <a href="#"
                               class="btn btn-xs btn-danger"
                               v-on:click="deleteEntry(item.id, index)">
                                Delete
                            </a>
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
        data() {
            return {
                news: []
            }
        },
        mounted() {
            var app = this;
            axios.get('http://api.laravel6.loc/news/index')
                .then(function(resp) {
                    app.news = resp.data['data'];
                })
                .catch(function(resp) {
                    console.log(resp);
                    alert("Could not load news");
                })
        },
        methods: {
            deleteEntry(id, index) {
                if (confirm("Do you really want to delete it?")) {
                    var app = this;
                    axios.delete('api/news/'+id)
                    .then(function(resp) {
                        app.news.splice(index, 1);
                    })
                    .catch(function (reps) {
                        alert("Could not delete news");
                    });
                }
            }
        },
    }
</script>