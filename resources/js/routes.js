import Home from './components/Home';
import Contact from './components/Contact';
import About from './components/About';
import Header from "./components/Header";
import Tab from "./components/Tab";
import Login from "./components/auth/Login";
import List from "./components/customers/List";
import New from "./components/customers/New";
export const routes = [
    {
        path: '/',
        component: Home,
        meta: {
            requiresAuth: true
        }
    },
    {
        path: '/contact',
        component: Contact
    },
    {
        path: '/header',
        component: Header
    },
    {
        path: '/list',
        component: List
    },
    {
        path: '/new',
        component: New
    },
    {
        path: '/about',
        component: About
    },
    {
        path: '/login',
        component: Login
    }
];
