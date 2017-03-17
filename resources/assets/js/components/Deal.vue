<template>
  <input type="hidden" name="service" v-model="this.service_id">
	<input type="hidden" name="applicant" v-model="this.applicant">
	<input type="hidden" name="conversation" v-model="this.conversation">
</template>
<script>

	export default
	{
		props:['service_id', 'token','applicant','conversation'],
		mounted()
		{

		}
	}
</script>
