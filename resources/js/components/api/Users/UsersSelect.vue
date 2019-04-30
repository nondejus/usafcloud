<template>
  <div>
    <select name="user_id" id="user_id" class="form-control">
      <option
        :value="user.id"
        v-for="user in users"
        :key="user.id"
      >{{ user.last_name + ', ' + user.first_name }}</option>
    </select>
  </div>
</template>

<script>
export default {
  data() {
    return {
      users: null
    };
  },
  mounted() {
    axios.get("/api/users").then(response => {
      this.users = response.data;
    });
  },
  methods: {}
};
</script>
