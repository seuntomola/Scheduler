<template>
    <DashboardLayout>
      <template #default>
        <div>
          <h1>Manage Locations</h1>
  
          <!-- Display flash success message if available -->
          <div v-if="$page.props.flash && $page.props.flash.success" class="alert-success">
            {{ $page.props.flash.success }}
          </div>
  
          <!-- Button to create a new location -->
          <Link :href="route('locations.create')" class="btn btn-primary">
            Add New Location
          </Link>
  
          <!-- Locations table -->
          <table class="table">
            <thead>
              <tr>
                <th>Name</th>
                <th>Type</th>
                <th>Capacity</th>
                <th>Active?</th>
                <th>Allocated?</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="loc in locations" :key="loc.id">
                <td>{{ loc.name }}</td>
                <td>{{ loc.type }}</td>
                <td>{{ loc.capacity }}</td>
                <td>{{ loc.is_active ? 'Yes' : 'No' }}</td>
                <td>{{ loc.is_allocated ? 'Yes' : 'No' }}</td>
                <td>
                  <!-- Edit link -->
                  <Link :href="route('locations.edit', loc.id)" class="btn btn-sm btn-info">
                    Edit
                  </Link>
  
                  <!-- Allocate link (only shown if location is not allocated) -->
                  <Link
                    v-if="!loc.is_allocated"
                    :href="route('locations.allocateForm', loc.id)"
                    class="btn btn-sm btn-warning"
                  >
                    Allocate
                  </Link>
  
                  <!-- Delete form -->
                  <form :action="route('locations.destroy', loc.id)" method="post" style="display:inline">
                    <input type="hidden" name="_method" value="delete" />
                    <button type="submit" class="btn btn-sm btn-danger">
                      Delete
                    </button>
                  </form>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </template>
    </DashboardLayout>
  </template>
  
  <script>
  import DashboardLayout from '../../Layouts/DashboardLayout.vue';
  import { Link } from '@inertiajs/vue3';
  
  export default {
    name: 'ManageLocationsIndex',
    components: {
      DashboardLayout,
      Link,
    },
    props: {
      locations: {
        type: Array,
        default: () => [],
      },
    },
  };
  </script>
  
  <style scoped>
  .table {
    width: 100%;
    border-collapse: collapse;
  }
  
  .table thead {
    background: #f4f4f4;
  }
  
  .table td,
  .table th {
    padding: 0.75rem;
    border: 1px solid #ccc;
  }
  
  .alert-success {
    background: #d4edda;
    padding: 1rem;
    margin-bottom: 1rem;
    border: 1px solid #c3e6cb;
  }
  
  .btn {
    padding: 0.4rem 0.7rem;
    margin-right: 0.5rem;
    text-decoration: none;
    cursor: pointer;
    color: #fff;
    background-color: #007bff;
    border: none;
    border-radius: 3px;
  }
  
  .btn-info {
    background-color: #17a2b8;
  }
  
  .btn-warning {
    background-color: #ffc107;
    color: #333;
  }
  
  .btn-danger {
    background-color: #dc3545;
  }
  </style>
  