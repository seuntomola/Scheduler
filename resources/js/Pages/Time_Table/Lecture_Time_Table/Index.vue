<script>
import DashboardLayout from "../../../Layouts/DashboardLayout.vue";
import FullCalendar from "@fullcalendar/vue3";
import dayGridPlugin from "@fullcalendar/daygrid";
import timeGridPlugin from "@fullcalendar/timegrid";
import interactionPlugin from "@fullcalendar/interaction";
export default {
    components: {
        DashboardLayout,
        FullCalendar,
    },
    data() {
        return {
            calendarOptions: {
                plugins: [dayGridPlugin, timeGridPlugin, interactionPlugin],
                initialView: "timeGridWeek", // default view
                editable: true, // allow drag-and-drop of events
                selectable: true, // allow user to click/drag to create events
                eventDurationEditable: true, // allow resizing
                slotMinTime: "08:00:00", // earliest time slot (8 AM)
                slotMaxTime: "18:00:00", // latest time slot (6 PM)
                headerToolbar: {
                    left: "prev,next today",
                    center: "title",
                    right: "dayGridMonth,timeGridWeek,timeGridDay",
                },
                events: [
                    {
                        id: 1,
                        title: "Intro to Programming",
                        start: "2025-04-04T10:00:00",
                        end: "2025-04-04T11:30:00",
                    },
                    {
                        id: 2,
                        title: "Meeting w/ Advisors",
                        start: "2025-04-05T09:00:00",
                        end: "2025-04-05T10:00:00",
                    },
                    // add more events or fetch them from your server
                ],
                // Callbacks for user interactions
                eventDrop: this.handleEventDrop,
                eventResize: this.handleEventResize,
                dateClick: this.handleDateClick, // if you want to create new events by clicking
            },
        };
    },
    methods: {
        // Fired when an event is dragged to a new time or day
        handleEventDrop(info) {
            console.log("Event dropped:", info.event.title);
            console.log("New start time:", info.event.start);
            console.log("New end time:", info.event.end);

            // E.g., make an API call or Inertia PUT request to save changes:
            // this.$inertia.put(`/events/${info.event.id}`, {
            //   start: info.event.startStr,
            //   end: info.event.endStr
            // });
        },

        // Fired when an event is resized
        handleEventResize(info) {
            console.log("Event resized:", info.event.title);
            console.log("New start time:", info.event.start);
            console.log("New end time:", info.event.end);

            // E.g.:
            // this.$inertia.put(`/events/${info.event.id}`, {
            //   start: info.event.startStr,
            //   end: info.event.endStr
            // });
        },

        // Fired when the user clicks an empty time slot (optional)
        handleDateClick(info) {
            console.log("Clicked date:", info.dateStr);
            // Potentially open a modal to create a new event.
        },
    },
};
</script>

<template>
    <DashboardLayout>
        <div class="calendar-container">
            
            <!-- FullCalendar component -->
            <FullCalendar :options="calendarOptions" />
        </div>
    </DashboardLayout>
</template>

<style scoped>
.calendar-container {
    width: 90%;
    max-width: 1200px;
    margin: 2rem auto;
}
</style>
