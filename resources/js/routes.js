const Welcome = () => import('./components/WelcomePage.vue' )
const UserList = () => import('./components/UsersList.vue' )
const AddUser = () => import('./components/AddUser.vue' )
const EditUser = () => import('./components/EditUser.vue' )

export const routes = [
    {
        path: '/',
        component: Welcome,
        meta : {
            title : 'Welcome'
        }
    },
    {
        path: '/users',
        component: UserList,
        meta : {
            title : 'Users list'
        }
    },
    {
        path: '/users/adduser',
        component: AddUser,
        meta : {
            title : 'Add User'
        }
    },
    {
        path: '/users/edit/:id',
        component: EditUser,
        meta : {
            title : 'Update User'
        },
        props: true
    }

]