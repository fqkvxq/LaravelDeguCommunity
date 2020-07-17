new Vue({
  el: '#login',
  data: {
      email: '',
      password: '',
      remember: false,
      errors: {}
  },
  methods: {
      login: function(){

          this.errors = {};

          var url = '/login';
          var params = {
              email: this.email,
              password: this.password,
              remember: this.remember,
          };
          // ログイン処理
          axios.post(url, params).then(function(response){
               // ログイン成功時の処理     
               location.href = '/home';
              })
              .catch(function(error){
                // ログイン失敗時のエラー処理
                if (error.response.status === 422) {
                  var responseErrors = error.response.data.errors;
                  var errors = {};
                  for(var key in responseErrors) {
                      errors[key] = responseErrors[key][0];
                  }
                  this.errors = errors;
                  console.log("バリテーションエラー", error.response);
                }
              });
      }
  }
});