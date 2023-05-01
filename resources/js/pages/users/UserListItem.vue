<script setup>
    // using moment js to format date
    // import moment from 'moment';
    
    // using helper function to format date (helper.js)
    import { formatDate } from '../../helper';

    import {ref} from "vue";
    import { useToaster } from '../../toaster';
    
    const userIdBeingDeleted = ref(null);
    const toastr = useToaster();

    defineProps({
        user: Object,
        index: Number,
    });

    const emit = defineEmits(['userDeleted', 'editUser']);

    const confirmUserDeletion = (user) => {
        userIdBeingDeleted.value = user.id;
        $('#deleteUserModal').modal('show');
    }

    const deleteUser = () => {
        axios.delete(`/api/users/${userIdBeingDeleted.value}`)
            .then(() => {
                $('#deleteUserModal').modal('hide');
                emit('userDeleted', userIdBeingDeleted.value);
                toastr.success('User deleted successfully!');
            });
    }

    const editUser = (user) => {
        emit('editUser', user);
    }
</script>

<template>
    <tr >
        <td>{{ index + 1 }}</td>
        <td>{{ user.name }}</td>
        <td>{{ user.email }}</td>
        <!-- using map collection method, laravel macro -->
        <!-- <td>{{ user.created_at }}</td> -->

        <!-- using accessor -->
        <!-- <td>{{ user.formatted_created_at }}</td> -->

        <!-- using moment js -->
        <!-- <td>{{ moment(user.created_at).format('YYYY-MM-DD') }}</td> -->

        <!-- using helper function (helper.js)-->
        <td>{{ formatDate(user.created_at) }}</td>

        <td>{{ user.role }}</td>
        <td>
            <a href="#" @click.prevent="editUser(user)"><i class="fa fa-edit"></i></a>
            <a href="#" @click.prevent="confirmUserDeletion(user)"><i class="fa fa-trash text-danger ml-2"></i></a>
        </td>
    </tr>

    <div class="modal fade" id="deleteUserModal" tabindex="-1" role="dialog" aria-labelledby="deleteUserModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteUserModalLabel">
                        <span>Delete User</span>
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h5>Are you sure you want to delete this user?</h5>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button @click.prevent="deleteUser" type="button" class="btn btn-primary">Delete</button>
                </div>
            </div>
        </div>
    </div>
</template>