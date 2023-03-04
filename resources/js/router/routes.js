const routes = [
    {
        path: '/tasks',
        component: () => import('../components/pages/Tasks.vue'),
        name: 'Tasks',
    }
];

export default routes;
