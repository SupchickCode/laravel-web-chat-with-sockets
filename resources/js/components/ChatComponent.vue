<template>
  <div class="container">
    <div class="row">
      <div class="col mt-5">
        <div class="card card-default">
          <div class="card-header">Messages</div>
          <div class="car-body p-0">
            <ul class="list-unstyled" style="height:300px; overflow-y:scroll">
              <li class="p-2" v-for="(message, index) in messages" :key="index">
                <strong>{{ message.user.name }}</strong>
                {{ message.message }}
              </li>
            </ul>
          </div>
          <input
            @keyup.enter="sendMessage"
            v-model="newMessage"
            type="text"
            name="message"
            class="form-control"
            placeholder="Enter your message"
          />
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props:["user"],

  data() {
    return {
      messages: [],
      newMessage: '',
      сhatroom: ''
    };
  },
  created() {
    this.fetchMessages();

    Echo.join('chat')
        .listen('MessageSent',(event) => {
          this.messages.push(event.message);
        });
  },
  methods: {


    fetchMessages() {
      let chatroom = document.location.pathname.substr(10)
      axios.get(chatroom + "/messages").then((response) => {
        this.messages = response.data;
      });
    },

    sendMessage() {
      let chatroom = document.location.pathname.substr(10)
        this.messages.push({
            user: this.user,
            message: this.newMessage
        })
        axios.post(chatroom + "/messages",{message: this.newMessage});
        this.newMessage = '';
    }
  },
};
</script>
