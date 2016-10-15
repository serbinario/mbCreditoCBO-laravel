angular.module('mbCredCBO')
    .factory('AgenciaApi', function($resource) {

        /* POST   /users
        // POST   /users/:id # We won't use PUT, but we can
        // DELETE /users/:id
        // GET    /users
        // GET    /users/:id
        */

        return $resource('/index.php/operador/getAgentes/:id', {}, {
            get: { cache: true, method: 'get' },
            save: { cache: true, method: 'put' }
        });

    })

    .factory('AgenciaApi2', function($http) {

        return {
            // get all the comments
            get : function() {
                return $http.get('/api/comments');
            },

            // save a comment (pass in comment data)
            save : function(commentData) {
                return $http({
                    method: 'POST',
                    url: '/api/comments',
                    headers: { 'Content-Type' : 'application/x-www-form-urlencoded' },
                    data: $.param(commentData)
                });
            },

            // destroy a comment
            destroy : function(id) {
                return $http.delete('/api/comments/' + id);
            }
        }

    });