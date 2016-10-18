/* POST   /users
 // POST   /users/:id # We won't use PUT, but we can
 // DELETE /users/:id
 // GET    /users
 // GET    /users/:id
 */
angular.module('mbCredCBO')
    //get( ); save( ); query( ); remove( ); delete( )
    // { 'get':    {method:'GET'},
    //     'save':   {method:'POST'},
    //     'query':  {method:'GET', isArray:true},
    //     'remove': {method:'DELETE'},
    //     'delete': {method:'DELETE'} };
    .factory('AgenciaApi', function($resource) {
        return $resource('/index.php/operador/:id', null, {
            'update': { method:'PUT' }
        });

    })

    .factory('AgenciaApi2', function($resource) {
        return $resource('/index.php/operador/getAgentes/:id');

    })

    .factory('AgenciaApi3', function($http) {

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

            update : function(commentData) {
                return $http({
                    method: 'PUT',
                    url: '/index.php/operador/1',
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