<script setup>
    import axios from 'axios';
    import {ref, onMounted, reactive} from "vue";
    import {Form, Field} from 'vee-validate';
    import * as yup from 'yup';
    import { useToaster } from '../../toaster';
    import UserListItem from './UserListItem.vue';

    // const users = [
    //     {
    //         id: 1,
    //         name: 'shreesha shrestha',
    //         email: 'shree@gmail.com',
    //     },
    //     {
    //         id: 2,
    //         name: 'shreesha',
    //         email: 'shreesha@gmail.com',
    //     },
    // ];

    const toastr = useToaster();
    const users = ref([]);
    const editing = ref(false);
    const formValues = ref();
    const form = ref(null);

    const getUsers = () => {
        axios.get('/api/users')
            .then((response) => {
                users.value = response.data;
            })
    }

    const createUser = (values, {resetForm, setErrors}) => {
        axios.post('/api/users', values)
            .then((response) => {
            users.value.unshift(response.data);
            $('#userFormModal').modal('hide');
            resetForm();
            toastr.success('User created successfully!');
        }).catch((error) => {
            if(error.response.data.errors){
                setErrors(error.response.data.errors);
            }else{
                console.log(error);
            }
            // setFieldError('email', error.response.data.errors.email[0]);
        });
    };

    // const form = reactive({
    //     name: '',
    //     email: '',
    //     password: '',
    // });

    // const createUser = () => {
    //     axios.post('/api/users', form)
    //         .then((response) => {
    //         users.value.unshift(response.data)
    //         form.name= '';
    //         form.email = '';
    //         form.password = '';
    //         $('#userFormModal').modal('hide');
    //     });
    // }

    const addUser = () => {
        editing.value = false;
        $('#userFormModal').modal('show');
    };

    const editUser = (user) => {
        editing.value = true;
        form.value.resetForm();
        $('#userFormModal').modal('show');
        formValues.value = {
            id: user.id,
            name: user.name,
            email: user.email,
        };
    };

    const updateUser = (values,{setErrors}) => {
        axios.put('/api/users/' + formValues.value.id, values)
            .then((response) => {
                const index = users.value.findIndex(user => user.id === response.data.id);
                users.value[index] = response.data;
                $('#userFormModal').modal('hide');
                toastr.success('User updated successfully!');
            }).catch((error) => {
                if(error.response.data.errors){
                    setErrors(error.response.data.errors);
                }else{
                    console.log(error);
                }
            });
    };

    const userDeleted = (userId) => {
        users.value = users.value.filter(user => user.id !== userId);
    }

    const createUserSchema = yup.object({
        name: yup.string().required(),
        email: yup.string().email().required(),
        password: yup.string().required().min(8),
    });

    const editUserSchema = yup.object({
        name: yup.string().required(),
        email: yup.string().email().required(),
        password: yup.string().when((password, schema) => {
            return password != '' ? schema.required().min(8) : schema;
        })
    });

    const handelSubmit = (values, actions) => {
        if(editing.value){
            updateUser(values, actions);
        }else{
            createUser(values, actions);
        }
    };

    onMounted(() => {
        getUsers();
    })
</script>

<template>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Users</h1>
                </div>

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Users</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">
            <button @click="addUser" type="button" class="mb-2 btn btn-primary">
                Add User
            </button>
            <div class="card">
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th style="widht:10px;">#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Registered Date</th>
                                <th>Role</th>
                                <th>Options</th>
                            </tr>
                        </thead>

                        <tbody>
                            <UserListItem 
                                v-for="(user, index) in users" 
                                :key="user.id"
                                :user=user
                                :index=index
                                @user-deleted="userDeleted"
                                @edit-user="editUser"
                            />
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="userFormModal" tabindex="-1" role="dialog" aria-labelledby="userFormModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="userFormModalLabel">
                        <span v-if="editing">Edit User</span>
                        <span v-else>Add New User</span>
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <Form ref="form" @submit="handelSubmit" :validation-schema="editing ? editUserSchema : createUserSchema" v-slot="{ errors }" :initial-values="formValues">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <Field name="name" type="text" class="form-control" :class="{'is-invalid':errors.name}" id="name" placeholder="Enter Full Name"/>
                            <span class="invalid-feedback">{{ errors.name }}</span>
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <Field name="email" type="email" class="form-control" :class="{'is-invalid':errors.email}" id="email" placeholder="Enter Email"/>
                            <span class="invalid-feedback">{{ errors.email }}</span>
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <Field name="password" type="password" class="form-control" :class="{'is-invalid':errors.password}" id="password" placeholder="Enter Password"/>
                            <span class="invalid-feedback">{{ errors.password }}</span>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </Form>
            </div>
        </div>
    </div>
</template>