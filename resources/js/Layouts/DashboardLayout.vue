<script>
import { Link } from "@inertiajs/vue3";

export default {
    components: {
        Link,
    },
    data() {
        return {
            // Sidebar & dropdown
            toggleSidebar: true,
            showDropdown: false,

            // Timetable collapsible
            showTimetableSubmenu: false,

            // Two separate collapsibles under Timetable
            showLectureSubmenu: false,
            showExamSubmenu: false,
        };
    },
    methods: {
        toggleSidebarHandler() {
            this.toggleSidebar = !this.toggleSidebar;
        },
        toggleDropdown() {
            this.showDropdown = !this.showDropdown;
        },

        // Collapses/expands the entire "Timetable" section
        toggleTimetableSubmenu() {
            this.showTimetableSubmenu = !this.showTimetableSubmenu;
        },

        // Collapses/expands the "Lectures" submenu
        toggleLectureSubmenu() {
            this.showLectureSubmenu = !this.showLectureSubmenu;
        },

        // Collapses/expands the "Exams" submenu
        toggleExamSubmenu() {
            this.showExamSubmenu = !this.showExamSubmenu;
        },
    },

    mounted() {
        console.log(this.$page.props);
    },
};
</script>

<template>
    <div :class="{ collapsed: !toggleSidebar }" class="wrapper">
        <!-- Sidebar -->
        <div class="sidebar">
            <div class="logo">
                <img src="/assets/img/LOGO.svg" alt="Logo" />
            </div>

            <!-- Example check for super_admin role -->
            <Link
                href="/dashboard"
                class="sidebar-link"
                v-if="$page.props.roleNames == 'super_admin'"
            >
                <svg
                    class="icon"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="currentColor"
                    viewBox="0 0 24 24"
                >
                    <path
                        d="M11.47 3.84a.75.75 0 011.06 0l8.69 8.69a.75.75 0
                        101.06-1.06l-8.689-8.69a2.25 2.25 0 00-3.182 0l-8.69 8.69a.75.75 0
                        001.061 1.06l8.69-8.69zM12 5.432l8.159 8.159c.03.03.06.058.091.086v6.198c0
                        1.035-.84 1.875-1.875 1.875H15a.75.75 0 01-.75-.75v-4.5a.75.75 0
                        00-.75-.75h-3a.75.75 0 00-.75.75V21a.75.75 0 01-.75.75H5.625a1.875
                        1.875 0 01-1.875-1.875v-6.198a2.29 2.29 0
                        00.091-.086L12 5.43z"
                    />
                </svg>
                <span class="link-text">Dashboard</span>
            </Link>

            <!-- TIMETABLE (Main Collapsible) -->
            <div
                class="sidebar-link"
                v-if="$page.props.roleNames == 'super_admin'"
                @click.prevent="toggleTimetableSubmenu"
                style="cursor: pointer"
            >
                <svg
                    class="icon"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="currentColor"
                    viewBox="0 0 24 24"
                >
                    <path
                        d="M11.47 3.84a.75.75 0 011.06 0l8.69 8.69a.75.75
                        0 101.06-1.06l-8.689-8.69a2.25 2.25 0
                        00-3.182 0l-8.69 8.69a.75.75 0
                        001.061 1.06l8.69-8.69zM12 5.432l8.159
                        8.159c.03.03.06.058.091.086v6.198c0
                        1.035-.84 1.875-1.875
                        1.875H15a.75.75 0
                        01-.75-.75v-4.5a.75.75 0
                        00-.75-.75h-3a.75.75
                        0 00-.75.75V21a.75.75 0
                        01-.75.75H5.625a1.875
                        1.875 0
                        01-1.875-1.875v-6.198a2.29 2.29 0
                        00.091-.086L12 5.43z"
                    />
                </svg>
                <span class="link-text">Timetable</span>

                <!-- Arrow icon to show/hide Timetable submenu -->
                <svg
                    class="icon"
                    style="margin-left: auto"
                    width="16"
                    height="16"
                    fill="currentColor"
                >
                    <!-- If not open, show downward arrow; if open, show upward arrow -->
                    <path
                        v-if="!showTimetableSubmenu"
                        d="M1.646 5.646a.5.5 0
                        0 1 .708 0L8 11.293l5.646-5.647a.5.5 0
                        0 1 .708.708l-6 6a.5.5 0
                        0 1-.708 0l-6-6a.5.5 0
                        0 1 0-.708z"
                    />
                    <path
                        v-else
                        d="M1.646 10.354a.5.5 0
                        0 0 .708 0L8
                        4.707l5.646
                        5.647a.5.5 0
                        0 0
                        .708-.708l-6-6a.5.5
                        0 0 0-.708
                        0l-6
                        6a.5.5 0
                        0 0
                        0
                        .708z"
                    />
                </svg>
            </div>

            <!-- Timetable Submenu (only appears if showTimetableSubmenu) -->
            <div
                class="submenu"
                v-show="showTimetableSubmenu"
                v-if="$page.props.roleNames == 'super_admin'"
            >
                <!-- LECTURES SUBMENU -->
                <div
                    class="sidebar-link"
                    @click.prevent="toggleLectureSubmenu"
                    style="cursor: pointer"
                >
                    <svg
                        class="icon"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor"
                        viewBox="0 0 24 24"
                    >
                        <path
                            d="M11.47 3.84a.75.75 0 011.06 0l8.69
                            8.69a.75.75 0
                            101.06-1.06l-8.689-8.69a2.25
                            2.25 0
                            00-3.182 0l-8.69
                            8.69a.75.75 0
                            001.061
                            1.06l8.69-8.69zM12
                            5.432l8.159
                            8.159c.03.03.06.058.091.086v6.198c0
                            1.035-.84
                            1.875-1.875 1.875H15a.75.75
                            0 01-.75-.75v-4.5a.75.75
                            0 00-.75-.75h-3a.75.75
                            0 00-.75.75V21a.75.75
                            0 01-.75.75H5.625a1.875
                            1.875 0
                            01-1.875-1.875v-6.198a2.29 2.29
                            0 00.091-.086L12 5.43z"
                        />
                    </svg>
                    <span class="link-text">Lectures</span>

                    <!-- Arrow icon for Lectures submenu -->
                    <svg
                        class="icon"
                        style="margin-left: auto"
                        width="16"
                        height="16"
                        fill="currentColor"
                    >
                        <path
                            v-if="!showLectureSubmenu"
                            d="M1.646 5.646a.5.5 0
                            0 1 .708 0L8 11.293l5.646-5.647a.5.5 0
                            0 1 .708.708l-6 6a.5.5 0
                            0 1-.708 0l-6-6a.5.5 0
                            0 1 0-.708z"
                        />
                        <path
                            v-else
                            d="M1.646 10.354a.5.5 0
                            0 0 .708 0L8
                            4.707l5.646
                            5.647a.5.5 0
                            0 0
                            .708-.708l-6-6a.5.5
                            0 0 0-.708
                            0l-6
                            6a.5.5 0
                            0 0
                            0
                            .708z"
                        />
                    </svg>
                </div>

                <!-- Actual Lecture Submenu items -->
                <div class="submenu" v-show="showLectureSubmenu">
                    <Link href="/timetable/lecture" class="sidebar-sublink"
                        >All Lectures</Link
                    >
                    <Link href="/lecture/create" class="sidebar-sublink"
                        >Create Lecture</Link
                    >
                    <!-- add more links as needed -->
                </div>

                <!-- EXAMS SUBMENU -->
                <div
                    class="sidebar-link"
                    @click.prevent="toggleExamSubmenu"
                    style="cursor: pointer"
                >
                    <svg
                        class="icon"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor"
                        viewBox="0 0 24 24"
                    >
                        <path
                            d="M11.47 3.84a.75.75 0
                            011.06 0l8.69
                            8.69a.75.75 0
                            101.06-1.06l-8.689-8.69a2.25 2.25
                            0 00-3.182
                            0l-8.69
                            8.69a.75.75 0
                            001.061
                            1.06l8.69-8.69zM12
                            5.432l8.159
                            8.159c.03.03.06.058.091.086v6.198c0
                            1.035-.84
                            1.875-1.875 1.875H15a.75.75
                            0 01-.75-.75v-4.5a.75.75
                            0 00-.75-.75h-3a.75.75
                            0 00-.75.75V21a.75.75
                            0 01-.75.75H5.625a1.875
                            1.875 0
                            01-1.875-1.875v-6.198a2.29 2.29
                            0 00.091-.086L12
                            5.43z"
                        />
                    </svg>
                    <span class="link-text">Exams</span>

                    <!-- Arrow icon for Exams submenu -->
                    <svg
                        class="icon"
                        style="margin-left: auto"
                        width="16"
                        height="16"
                        fill="currentColor"
                    >
                        <path
                            v-if="!showExamSubmenu"
                            d="M1.646 5.646a.5.5 0
                            0 1 .708 0L8 11.293l5.646-5.647a.5.5 0
                            0 1 .708.708l-6 6a.5.5 0
                            0 1-.708 0l-6-6a.5.5 0
                            0 1 0-.708z"
                        />
                        <path
                            v-else
                            d="M1.646 10.354a.5.5 0
                            0 0 .708 0L8
                            4.707l5.646
                            5.647a.5.5 0
                            0 0
                            .708-.708l-6-6a.5.5
                            0 0 0-.708
                            0l-6
                            6a.5.5 0
                            0 0
                            0
                            .708z"
                        />
                    </svg>
                </div>

                <!-- Actual Exams Submenu items -->
                <div class="submenu" v-show="showExamSubmenu">
                    <Link href="/timetable/exams" class="sidebar-sublink">All Exams</Link>
                    <Link href="/timetable/schedule_exams" class="sidebar-sublink"
                        >Schedule Exam</Link
                    >
                </div>
            </div>

            <!-- Additional links for super_admin can follow here... -->
            <Link
                :href="route('manage_location.manage_location')"
                class="sidebar-link"
                v-if="$page.props.roleNames == 'super_admin'"
            >
                <svg
                    class="icon"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="currentColor"
                    viewBox="0 0 24 24"
                >
                    <path
                        d="M11.644 1.59a.75.75 0 01.712 0l9.75 5.25a.75.75 0
                            010 1.32l-9.75 5.25a.75.75 0 01-.712 0l-9.75-5.25a.75.75 0
                            010-1.32l9.75-5.25z"
                    />
                    <path
                        d="M3.265 10.602l7.668 4.129a2.25 2.25 0 002.134
                            0l7.668-4.13 1.37.739a.75.75 0 010 1.32l-9.75 5.25a.75.75 0
                            01-.71 0l-9.75-5.25a.75.75 0
                            010-1.32l1.37-.738z"
                    />
                    <path
                        d="M10.933 19.231l-7.668-4.13-1.37.739a.75.75 0
                            000 1.32l9.75 5.25c.221.12.489.12.71
                            0l9.75-5.25a.75.75 0 000-1.32l-1.37-.738-7.668
                            4.13a2.25 2.25 0 01-2.134-.001z"
                    />
                </svg>
                <span class="link-text">Manage Locations</span>
            </Link>

            <Link
                :href="route('emergency_broadcast.emergency_broadcast')"
                class="sidebar-link"
                v-if="$page.props.roleNames == 'super_admin'"
            >
                <svg
                    class="icon"
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 24 24"
                    fill="currentColor"
                >
                    <path
                        d="M12 2.25c.414 0 .75.336.75.75v.75h6.375a1.125
                            1.125 0 011.125 1.125V12c0 .414-.336.75-.75.75H3.75A.75.75
                            0 013 12V4.875A1.125 1.125 0 014.125 3.75H10.5v-.75c0-.414.336-.75.75-.75z"
                    />
                    <path
                        d="M3 15.75a.75.75 0 01.75-.75h16.5a.75.75 0
                            01.75.75v3.375a1.125 1.125 0 01-1.125
                            1.125H4.125A1.125 1.125 0 013 19.125V15.75z"
                    />
                </svg>
                <span class="link-text">Emergency Broadcast</span>
            </Link>
           
            <Link
                :href="route('notifi_cation.notifi_cation')"
                class="sidebar-link"
                v-if="$page.props.roleNames == 'super_admin'"
            >
                <svg
                    class="icon"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="currentColor"
                    viewBox="0 0 24 24"
                >
                    <path
                        fill-rule="evenodd"
                        d="M4.5 8.25A6.75 6.75 0
                            0111.25 1.5h1.5a6.75 6.75 0
                            016.75 6.75v3.737c0 .998.3
                            1.967.858 2.79l1.462 2.194a.75.75 0
                            01-.63 1.144H3.3a.75.75 0
                            01-.63-1.144l1.462-2.194a4.934
                            4.934 0 00.858-2.79V8.25zm2.727
                            11.25h9.546a3.375 3.375 0
                            01-6.586
                            1.286.75.75 0 10-1.347
                            0A3.375 3.375 0
                            017.227 19.5z"
                        clip-rule="evenodd"
                    />
                </svg>
                <span class="link-text">Notifications</span>
            </Link>

            <Link 
            :href="route('my_timetable.my_timetable')"
            class="sidebar-link" v-if="$page.props.roleNames == 'super_admin'">
                <svg class="icon" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M6.75 2.25A1.5 1.5 0
                            005.25 3.75v.75h-1.5a3 3 0
                            00-3 3v10.5a3 3 0
                            003 3h14.25a3 3 0
                            003-3V7.5a3 3 0
                            00-3-3h-1.5v-.75a1.5 1.5 0
                            00-1.5-1.5h-.75a.75.75 0
                            000 1.5h.75v.75h-9v-.75h.75a.75.75 0
                            000-1.5h-.75zM3.75 7.5h1.5v1.5a.75.75 0
                            001.5 0V7.5h9v1.5a.75.75 0
                            001.5 0V7.5h1.5a1.5 1.5 0
                            011.5 1.5v2.25h-18V9a1.5 1.5
                            0 011.5-1.5zM3.75 13.5h18v4.5a1.5 1.5 0
                            01-1.5 1.5H3.75a1.5 1.5 0
                            01-1.5-1.5v-4.5z"/>
                    </svg>
                    <span class="link-text">My Timetable</span>
                </Link>



            <!-- Logout link (common to all roles) -->
            <Link href="/logout" method="post" as="button" class="sidebar-link">
                <svg
                    class="icon"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="currentColor"
                    viewBox="0 0 24 24"
                >
                    <path
                        fill-rule="evenodd"
                        d="M7.5 3.75A1.5
                        1.5 0 006 5.25v13.5a1.5
                        1.5 0 001.5
                        1.5h6a1.5 1.5 0 001.5-1.5V15a.75.75
                        0 011.5 0v3.75a3
                        3 0 01-3 3h-6a3 3
                        0 01-3-3V5.25a3
                        3 0 013-3h6a3
                        3 0 013
                        3V9A.75.75 0
                        0115 9V5.25a1.5 1.5
                        0 00-1.5-1.5h-6zm5.03
                        4.72a.75.75 0
                        010
                        1.06l-1.72
                        1.72h10.94a.75.75
                        0
                        010
                        1.5H10.81l1.72
                        1.72a.75.75 0
                        11-1.06
                        1.06l-3-3a.75.75
                        0
                        010-1.06l3-3a.75.75
                        0
                        011.06
                        0z"
                        clip-rule="evenodd"
                    />
                </svg>
                <span class="link-text">Logout</span>
            </Link>
        </div>
        <!-- /Sidebar -->

        <!-- Content Area -->
        <div class="content">
            <!-- Navbar -->
            <div class="navbar">
                <button class="toggle-btn" @click="toggleSidebarHandler">
                    &#9776;
                </button>

                <div class="dropdown-container">
                    <button class="dropdown-btn" @click="toggleDropdown">
                        {{ $page.props.auth.user.name }} ▼
                    </button>
                    <div v-if="showDropdown" class="dropdown-menu">
                        <Link href="/profile" class="dropdown-item"
                            >Profile</Link
                        >
                        <Link href="/settings" class="dropdown-item"
                            >Settings</Link
                        >
                        <Link
                            href="/logout"
                            method="post"
                            as="button"
                            class="dropdown-item"
                            >Logout</Link
                        >
                    </div>
                </div>
            </div>

            <div class="main-content">
                <slot />
            </div>
        </div>
    </div>
</template>

<style scoped>
body {
    margin: 0;
    font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
}

.wrapper {
    display: flex;
    min-height: 100vh;
}

.sidebar {
    width: 250px;
    height: 100vh;
    position: fixed;
    background: #ffffff;
    box-shadow: 2px 0 8px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease;
    overflow-x: hidden;
}

.logo {
    padding: 1.5rem;
    text-align: center;
    border-bottom: 1px solid #e0e0e0;
}

.logo img {
    max-width: 120px;
}

.sidebar-link {
    display: flex;
    align-items: center;
    padding: 1rem 1.5rem;
    color: #333;
    text-decoration: none;
    transition: all 0.2s ease;
    cursor: pointer;
}

.sidebar-link:hover {
    background: #f5f5f5;
}

.icon {
    width: 24px;
    height: 24px;
    flex-shrink: 0;
}

.link-text {
    margin-left: 1rem;
    white-space: nowrap;
}

/* SUBMENU styles */
.submenu {
    display: flex;
    flex-direction: column;
    margin-left: 1rem; /* Indent child collapsibles/links */
}
.sidebar-sublink {
    display: flex;
    align-items: center;
    padding: 0.75rem 1.5rem;
    color: #333;
    text-decoration: none;
    transition: all 0.2s ease;
    font-size: 0.9rem; /* slightly smaller font */
}
.sidebar-sublink:hover {
    background: #f5f5f5;
}

/* CONTENT AREA */
.content {
    margin-left: 250px;
    flex: 1;
    transition: all 0.3s ease;
}

.navbar {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 1rem 2rem;
    background: #2c3e50;
    color: white;
    position: sticky;
    top: 0;
    z-index: 1000;
}

.toggle-btn {
    background: none;
    border: none;
    color: white;
    font-size: 1.5rem;
    cursor: pointer;
    padding: 0.5rem;
}

.dropdown-container {
    position: relative;
}
.dropdown-btn {
    background: none;
    border: none;
    color: white;
    padding: 0.5rem 1rem;
    cursor: pointer;
    font-size: 1rem;
}
.dropdown-menu {
    position: absolute;
    right: 0;
    top: 100%;
    background: white;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
    border-radius: 6px;
    min-width: 180px;
    overflow: hidden;
}
.dropdown-item {
    padding: 0.75rem 1.5rem;
    color: #333;
    text-decoration: none;
    display: block;
    transition: background 0.2s ease;
}
.dropdown-item:hover {
    background: #f8f9fa;
}

/* MAIN CONTENT */
.main-content {
    padding: 2rem;
}

/* COLLAPSED STATE */
.collapsed .sidebar {
    width: 70px;
}

.collapsed .logo {
    display: none;
}

.collapsed .link-text {
    display: none;
}

.collapsed .sidebar-link {
    justify-content: center;
    padding: 1rem;
}

.collapsed .content {
    margin-left: 70px;
}

/* RESPONSIVE */
@media (max-width: 768px) {
    .sidebar {
        width: 70px;
    }
    .logo,
    .link-text {
        display: none;
    }
    .sidebar-link {
        justify-content: center;
        padding: 1rem;
    }
    .content {
        margin-left: 70px;
    }
}
</style>
