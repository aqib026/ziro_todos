<template>
    <div class="container mt-5">
    <div class='row'>
        <div class="col-md-8 col-md-offset-2">

        <h4>Todo's List</h4>
            <p>
                <router-link :to="{ name: 'logout' }">Logout</router-link>
            </p>
            <form action="#" @submit.prevent="createTodo()">
            <div class="input-group">
                <input v-model="todo.body" type="text" name="body" class="form-control" autofocus>
                <span class="input-group-btn">
                    <button type="submit" class="btn btn-primary">New Todo</button>
                </span>
            </div>
        </form>
        <h4>All Todos</h4>

        <ul class="list-group" v-if="!loading">
            <li v-if='list.length === 0'>There are no todos yet!</li>
            <li class="list-group-item" v-for="(todo, index) in list">

                {{ todo.body }}
                <button @click="deleteTodo(todo.id)" class="btn btn-danger btn-xs pull-right">Delete</button>

                <button @click="editTodo(todo.id,todo.body)" class="btn btn-primary btn-xs pull-right" style="margin-right:6px;">Edit</button>
            </li>
        </ul>
    </div>
    </div>
    </div>
</template>

<script>
	//import {RotateSquare2} from 'vue-loading-spinner';

	export default {
        data() {
            return {
            	loading: true,
                list: [],
                todo: {
                    id: '',
                    body: ''
                }
            };
        },
        
        created() {
            this.fetchTodoList();
        },
        
        methods: {
            fetchTodoList() {
                console.log(this.state);
                axios.get('api/todos', {
                headers: {
                    Authorization: 'Bearer ' + localStorage.getItem('token')
                }
            })
                    .then((res) => {
                            this.list = res.data;
                            this.loading = false;
                    })
			        .catch((err) => console.error(err));;
            }, 
            editTodo(pid,pbody){
                this.todo.id = pid;
                this.todo.body = pbody;
            },
            updateTodo(){
                axios.post('api/update_todo/'+ this.todo.id , this.todo, {
                headers: {
                    Authorization: 'Bearer ' + localStorage.getItem('token')
                    }
                })
                    .then((res) => {
                        this.todo.id   = '';
                        this.todo.body = '';
                        this.fetchTodoList()
                    })
                    .catch((err) => console.error(err));
            },
            createTodo() {
                if(this.todo.id != ''){ this.updateTodo(); return; } 
                axios.post('api/todos', this.todo, {
                headers: {
                    Authorization: 'Bearer ' + localStorage.getItem('token')
                }
            })
                    .then((res) => {
                        this.todo.body = '';
                        this.fetchTodoList()
                    })
                    .catch((err) => console.error(err));
            },
 
            deleteTodo(id) {
                axios.delete('api/todos/' + id, {
                headers: {
                    Authorization: 'Bearer ' + localStorage.getItem('token')
                }
            })
                    .then((res) => {
                        this.fetchTodoList()
                    })
                    .catch((err) => console.error(err));
            },
        }
    }
</script>
</script>
