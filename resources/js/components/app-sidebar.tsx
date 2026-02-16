import { Link, usePage } from '@inertiajs/react';
import {
    BookOpen,
    CalendarCheck,
    Folder,
    Hotel,
    LayoutGrid,
    User,
} from 'lucide-react';
import { NavFooter } from '@/components/nav-footer';
import { NavMain } from '@/components/nav-main';
import { NavUser } from '@/components/nav-user';
import type { SharedData } from '@/types';
import {
    Sidebar,
    SidebarContent,
    SidebarFooter,
    SidebarHeader,
    SidebarMenu,
    SidebarMenuButton,
    SidebarMenuItem,
} from '@/components/ui/sidebar';
import type { NavItem } from '@/types';
import AppLogo from './app-logo';
import { dashboard } from '@/routes';

const managerNavItems: NavItem[] = [
    {
        title: 'Dashboard',
        href: '/dashboard',
        icon: LayoutGrid,
    },
    {
        title: 'Rooms',
        href: '/rooms',
        icon: Hotel,
    },
    {
        title: 'Guest',
        href: '/guests',
        icon: User,
    },
    {
        title: 'Booking',
        href: '/bookings',
        icon: CalendarCheck,
    },
];

const adminNavItems: NavItem[] = [
    {
        title: 'Dashboard',
        href: '/dashboard',
        icon: LayoutGrid,
    },
    {
        title: 'Assign Manager',
        href: '/assign-manager',
        icon: Hotel,
    },
    {
        title: 'Manage Hotels',
        href: '/hotels',
        icon: Hotel,
    },
];
// const footerNavItems: NavItem[] = [
//     {
//         title: 'Repository',
//         href: 'https://github.com/laravel/react-starter-kit',
//         icon: Folder,
//     },
//     {
//         title: 'Documentation',
//         href: 'https://laravel.com/docs/starter-kits#react',
//         icon: BookOpen,
//     },
// ];

export function AppSidebar() {
    const { auth } = usePage<SharedData>().props;
    const user = auth?.user;
    if (user?.role === 'manager' && !user?.hotel_id) {
        <Sidebar collapsible="icon" variant="inset">
            <SidebarHeader>
                <SidebarMenu>
                    <SidebarMenuItem>
                        <SidebarMenuButton size="lg" asChild>
                            <Link href="/dashboard" prefetch>
                                <AppLogo />
                            </Link>
                        </SidebarMenuButton>
                    </SidebarMenuItem>
                </SidebarMenu>
            </SidebarHeader>

            <SidebarContent>
                <NavMain
                    items={[
                        {
                            title: 'Dashboard',
                            href: '/dashboard',
                            icon: LayoutGrid,
                        },
                    ]}
                />
            </SidebarContent>
        </Sidebar>;
    }
    const isAdmin = auth?.user?.role === 'admin';
    return (
        <Sidebar collapsible="icon" variant="inset">
            <SidebarHeader>
                <SidebarMenu>
                    <SidebarMenuItem>
                        <SidebarMenuButton size="lg" asChild>
                            <Link href={dashboard()} prefetch>
                                <AppLogo />
                            </Link>
                        </SidebarMenuButton>
                    </SidebarMenuItem>
                </SidebarMenu>
            </SidebarHeader>

            <SidebarContent>
                <NavMain items={isAdmin ? adminNavItems : managerNavItems} />
            </SidebarContent>
        </Sidebar>
    );
}
