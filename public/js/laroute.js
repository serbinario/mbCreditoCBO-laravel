(function () {

    var laroute = (function () {

        var routes = {

            absolute: false,
            rootUrl: 'http://localhost',
            routes : [{"host":null,"methods":["GET","HEAD"],"uri":"auth\/login","name":"auth.login","action":"MbCreditoCBO\Http\Controllers\Auth\AuthController@getLogin"},{"host":null,"methods":["POST"],"uri":"auth\/login","name":"auth.postLogin","action":"MbCreditoCBO\Http\Controllers\Auth\AuthController@postLogin"},{"host":null,"methods":["GET","HEAD"],"uri":"auth\/logout","name":"auth.getLogout","action":"MbCreditoCBO\Http\Controllers\Auth\AuthController@getLogout"},{"host":null,"methods":["GET","HEAD"],"uri":"auth\/register","name":null,"action":"MbCreditoCBO\Http\Controllers\Auth\AuthController@getRegister"},{"host":null,"methods":["POST"],"uri":"auth\/register","name":null,"action":"MbCreditoCBO\Http\Controllers\Auth\AuthController@postRegister"},{"host":null,"methods":["GET","HEAD"],"uri":"\/","name":null,"action":"MbCreditoCBO\Http\Controllers\DashBoardController@index"},{"host":null,"methods":["GET","HEAD"],"uri":"index","name":"index","action":"MbCreditoCBO\Http\Controllers\DefaultController@index"},{"host":null,"methods":["GET","HEAD"],"uri":"dashboard","name":"dashboard","action":"MbCreditoCBO\Http\Controllers\DashBoardController@index"},{"host":null,"methods":["GET","HEAD"],"uri":"dashboard\/chartContratosByMonth\/{searchAgente}","name":"dashboard.chartContratosByMonth","action":"MbCreditoCBO\Http\Controllers\DashBoardController@getDataChartContratosByMonth"},{"host":null,"methods":["GET","HEAD"],"uri":"dashboard\/chartContratosByYear\/{searchAgente}","name":"dashboard.chartContratosByYear","action":"MbCreditoCBO\Http\Controllers\DashBoardController@getDataChartContratosByYear"},{"host":null,"methods":["GET","HEAD"],"uri":"operador\/index","name":"operador.index","action":"MbCreditoCBO\Http\Controllers\OperadorController@index"},{"host":null,"methods":["GET","HEAD"],"uri":"operador\/grid","name":"operador.grid","action":"MbCreditoCBO\Http\Controllers\OperadorController@grid"},{"host":null,"methods":["GET","HEAD"],"uri":"operador\/create","name":"operador.create","action":"MbCreditoCBO\Http\Controllers\OperadorController@create"},{"host":null,"methods":["POST"],"uri":"operador\/store","name":"operador.store","action":"MbCreditoCBO\Http\Controllers\OperadorController@store"},{"host":null,"methods":["GET","HEAD"],"uri":"operador\/edit\/{id}","name":"operador.edit","action":"MbCreditoCBO\Http\Controllers\OperadorController@edit"},{"host":null,"methods":["POST"],"uri":"operador\/update\/{id}","name":"operador.update","action":"MbCreditoCBO\Http\Controllers\OperadorController@update"},{"host":null,"methods":["POST"],"uri":"operador\/searchChaveJ","name":"operador.searchChaveJ","action":"MbCreditoCBO\Http\Controllers\OperadorController@searchChaveJ"},{"host":null,"methods":["GET","HEAD"],"uri":"contrato\/index","name":"contrato.index","action":"MbCreditoCBO\Http\Controllers\ContratoController@index"},{"host":null,"methods":["GET","HEAD"],"uri":"contrato\/grid","name":"contrato.grid","action":"MbCreditoCBO\Http\Controllers\ContratoController@grid"},{"host":null,"methods":["GET","HEAD"],"uri":"contrato\/create","name":"contrato.create","action":"MbCreditoCBO\Http\Controllers\ContratoController@create"},{"host":null,"methods":["GET","HEAD"],"uri":"contrato\/createContrato\/{idCliente}","name":"contrato.createContrato","action":"MbCreditoCBO\Http\Controllers\ContratoController@createContrato"},{"host":null,"methods":["POST"],"uri":"contrato\/store","name":"contrato.store","action":"MbCreditoCBO\Http\Controllers\ContratoController@store"},{"host":null,"methods":["GET","HEAD"],"uri":"contrato\/edit\/{id}","name":"contrato.edit","action":"MbCreditoCBO\Http\Controllers\ContratoController@edit"},{"host":null,"methods":["POST"],"uri":"contrato\/update\/{id}","name":"contrato.update","action":"MbCreditoCBO\Http\Controllers\ContratoController@update"},{"host":null,"methods":["GET","HEAD"],"uri":"contrato\/searchCliente\/{clienteCpf}","name":"contrato.searchCliente","action":"MbCreditoCBO\Http\Controllers\ContratoController@searchCliente"},{"host":null,"methods":["POST"],"uri":"contrato\/searchContrato","name":"contrato.searchContrato","action":"MbCreditoCBO\Http\Controllers\ContratoController@searchContrato"},{"host":null,"methods":["POST"],"uri":"contrato\/searchCpf","name":"contrato.searchCpf","action":"MbCreditoCBO\Http\Controllers\ContratoController@searchCpf"},{"host":null,"methods":["GET","HEAD"],"uri":"contrato\/telefone\/grid\/{idClient}","name":"contrato.telefone.grid","action":"MbCreditoCBO\Http\Controllers\ContratoController@gridPhones"},{"host":null,"methods":["POST"],"uri":"contrato\/telefone\/store\/{idClient}","name":"contrato.telefone.create","action":"MbCreditoCBO\Http\Controllers\ContratoController@storePhone"},{"host":null,"methods":["GET","HEAD"],"uri":"contrato\/viewContrato\/{id}","name":"contrato.viewContrato","action":"MbCreditoCBO\Http\Controllers\ContratoController@viewContrato"},{"host":null,"methods":["GET","HEAD"],"uri":"contrato\/buscaAgencia","name":"contrato.buscaAgencia","action":"MbCreditoCBO\Http\Controllers\ContratoController@buscaAgencia"},{"host":null,"methods":["GET","HEAD"],"uri":"contrato\/buscaAgencia\/{idAgencia}","name":"contrato.buscaAgencia","action":"MbCreditoCBO\Http\Controllers\ContratoController@buscaAgencia"},{"host":null,"methods":["GET","HEAD"],"uri":"contrato\/buscaNoAgencia\/{idAgencia}","name":"contrato.buscaNoAgencia","action":"MbCreditoCBO\Http\Controllers\ContratoController@buscaNoAgencia"},{"host":null,"methods":["GET","HEAD"],"uri":"agencia\/index","name":"agencia.index","action":"MbCreditoCBO\Http\Controllers\AgenciaCallCenterController@index"},{"host":null,"methods":["GET","HEAD"],"uri":"agencia\/grid","name":"agencia.grid","action":"MbCreditoCBO\Http\Controllers\AgenciaCallCenterController@grid"},{"host":null,"methods":["GET","HEAD"],"uri":"agencia\/create","name":"agencia.create","action":"MbCreditoCBO\Http\Controllers\AgenciaCallCenterController@create"},{"host":null,"methods":["POST"],"uri":"agencia\/store","name":"agencia.store","action":"MbCreditoCBO\Http\Controllers\AgenciaCallCenterController@store"},{"host":null,"methods":["GET","HEAD"],"uri":"agencia\/edit\/{id}","name":"agencia.edit","action":"MbCreditoCBO\Http\Controllers\AgenciaCallCenterController@edit"},{"host":null,"methods":["POST"],"uri":"agencia\/update\/{id}","name":"agencia.update","action":"MbCreditoCBO\Http\Controllers\AgenciaCallCenterController@update"},{"host":null,"methods":["GET","HEAD"],"uri":"convenio\/index","name":"convenio.index","action":"MbCreditoCBO\Http\Controllers\ConvenioCallCenterController@index"},{"host":null,"methods":["GET","HEAD"],"uri":"convenio\/grid","name":"convenio.grid","action":"MbCreditoCBO\Http\Controllers\ConvenioCallCenterController@grid"},{"host":null,"methods":["GET","HEAD"],"uri":"convenio\/create","name":"convenio.create","action":"MbCreditoCBO\Http\Controllers\ConvenioCallCenterController@create"},{"host":null,"methods":["POST"],"uri":"convenio\/store","name":"convenio.store","action":"MbCreditoCBO\Http\Controllers\ConvenioCallCenterController@store"},{"host":null,"methods":["GET","HEAD"],"uri":"convenio\/edit\/{id}","name":"convenio.edit","action":"MbCreditoCBO\Http\Controllers\ConvenioCallCenterController@edit"},{"host":null,"methods":["POST"],"uri":"convenio\/update\/{id}","name":"convenio.update","action":"MbCreditoCBO\Http\Controllers\ConvenioCallCenterController@update"},{"host":null,"methods":["GET","HEAD"],"uri":"usuario\/index","name":"usuario.index","action":"MbCreditoCBO\Http\Controllers\UsuarioController@index"},{"host":null,"methods":["GET","HEAD"],"uri":"usuario\/grid","name":"usuario.grid","action":"MbCreditoCBO\Http\Controllers\UsuarioController@grid"},{"host":null,"methods":["GET","HEAD"],"uri":"usuario\/create","name":"usuario.create","action":"MbCreditoCBO\Http\Controllers\UsuarioController@create"},{"host":null,"methods":["POST"],"uri":"usuario\/store","name":"usuario.store","action":"MbCreditoCBO\Http\Controllers\UsuarioController@store"},{"host":null,"methods":["GET","HEAD"],"uri":"usuario\/edit\/{id}","name":"usuario.edit","action":"MbCreditoCBO\Http\Controllers\UsuarioController@edit"},{"host":null,"methods":["POST"],"uri":"usuario\/update\/{id}","name":"usuario.update","action":"MbCreditoCBO\Http\Controllers\UsuarioController@update"},{"host":null,"methods":["GET","HEAD"],"uri":"usuario\/verificarOperador","name":"usuario.verificarOperador","action":"MbCreditoCBO\Http\Controllers\UsuarioController@verificarOperador"},{"host":null,"methods":["GET","HEAD"],"uri":"api\/v1\/operador","name":"api.v1.api.v1.operador.index","action":"MbCreditoCBO\Http\Controllers\Api\V1\OperadorController@index"},{"host":null,"methods":["GET","HEAD"],"uri":"api\/v1\/operador\/create","name":"api.v1.api.v1.operador.create","action":"MbCreditoCBO\Http\Controllers\Api\V1\OperadorController@create"},{"host":null,"methods":["POST"],"uri":"api\/v1\/operador","name":"api.v1.api.v1.operador.store","action":"MbCreditoCBO\Http\Controllers\Api\V1\OperadorController@store"},{"host":null,"methods":["GET","HEAD"],"uri":"api\/v1\/operador\/{operador}","name":"api.v1.api.v1.operador.show","action":"MbCreditoCBO\Http\Controllers\Api\V1\OperadorController@show"},{"host":null,"methods":["GET","HEAD"],"uri":"api\/v1\/operador\/{operador}\/edit","name":"api.v1.api.v1.operador.edit","action":"MbCreditoCBO\Http\Controllers\Api\V1\OperadorController@edit"},{"host":null,"methods":["PUT"],"uri":"api\/v1\/operador\/{operador}","name":"api.v1.api.v1.operador.update","action":"MbCreditoCBO\Http\Controllers\Api\V1\OperadorController@update"},{"host":null,"methods":["PATCH"],"uri":"api\/v1\/operador\/{operador}","name":"api.v1.","action":"MbCreditoCBO\Http\Controllers\Api\V1\OperadorController@update"},{"host":null,"methods":["DELETE"],"uri":"api\/v1\/operador\/{operador}","name":"api.v1.api.v1.operador.destroy","action":"MbCreditoCBO\Http\Controllers\Api\V1\OperadorController@destroy"},{"host":null,"methods":["GET","HEAD"],"uri":"api\/v1\/agencia","name":"api.v1.api.v1.agencia.index","action":"MbCreditoCBO\Http\Controllers\Api\V1\AgenciaCallCenterController@index"},{"host":null,"methods":["GET","HEAD"],"uri":"api\/v1\/agencia\/create","name":"api.v1.api.v1.agencia.create","action":"MbCreditoCBO\Http\Controllers\Api\V1\AgenciaCallCenterController@create"},{"host":null,"methods":["POST"],"uri":"api\/v1\/agencia","name":"api.v1.api.v1.agencia.store","action":"MbCreditoCBO\Http\Controllers\Api\V1\AgenciaCallCenterController@store"},{"host":null,"methods":["GET","HEAD"],"uri":"api\/v1\/agencia\/{agencia}","name":"api.v1.api.v1.agencia.show","action":"MbCreditoCBO\Http\Controllers\Api\V1\AgenciaCallCenterController@show"},{"host":null,"methods":["GET","HEAD"],"uri":"api\/v1\/agencia\/{agencia}\/edit","name":"api.v1.api.v1.agencia.edit","action":"MbCreditoCBO\Http\Controllers\Api\V1\AgenciaCallCenterController@edit"},{"host":null,"methods":["PUT"],"uri":"api\/v1\/agencia\/{agencia}","name":"api.v1.api.v1.agencia.update","action":"MbCreditoCBO\Http\Controllers\Api\V1\AgenciaCallCenterController@update"},{"host":null,"methods":["PATCH"],"uri":"api\/v1\/agencia\/{agencia}","name":"api.v1.","action":"MbCreditoCBO\Http\Controllers\Api\V1\AgenciaCallCenterController@update"},{"host":null,"methods":["DELETE"],"uri":"api\/v1\/agencia\/{agencia}","name":"api.v1.api.v1.agencia.destroy","action":"MbCreditoCBO\Http\Controllers\Api\V1\AgenciaCallCenterController@destroy"},{"host":null,"methods":["GET","HEAD"],"uri":"api\/v1\/contrato","name":"api.v1.api.v1.contrato.index","action":"MbCreditoCBO\Http\Controllers\Api\V1\ContratoController@index"},{"host":null,"methods":["GET","HEAD"],"uri":"api\/v1\/contrato\/create","name":"api.v1.api.v1.contrato.create","action":"MbCreditoCBO\Http\Controllers\Api\V1\ContratoController@create"},{"host":null,"methods":["POST"],"uri":"api\/v1\/contrato","name":"api.v1.api.v1.contrato.store","action":"MbCreditoCBO\Http\Controllers\Api\V1\ContratoController@store"},{"host":null,"methods":["GET","HEAD"],"uri":"api\/v1\/contrato\/{contrato}","name":"api.v1.api.v1.contrato.show","action":"MbCreditoCBO\Http\Controllers\Api\V1\ContratoController@show"},{"host":null,"methods":["GET","HEAD"],"uri":"api\/v1\/contrato\/{contrato}\/edit","name":"api.v1.api.v1.contrato.edit","action":"MbCreditoCBO\Http\Controllers\Api\V1\ContratoController@edit"},{"host":null,"methods":["PUT"],"uri":"api\/v1\/contrato\/{contrato}","name":"api.v1.api.v1.contrato.update","action":"MbCreditoCBO\Http\Controllers\Api\V1\ContratoController@update"},{"host":null,"methods":["PATCH"],"uri":"api\/v1\/contrato\/{contrato}","name":"api.v1.","action":"MbCreditoCBO\Http\Controllers\Api\V1\ContratoController@update"},{"host":null,"methods":["DELETE"],"uri":"api\/v1\/contrato\/{contrato}","name":"api.v1.api.v1.contrato.destroy","action":"MbCreditoCBO\Http\Controllers\Api\V1\ContratoController@destroy"},{"host":null,"methods":["GET","HEAD"],"uri":"api\/v1\/convenio","name":"api.v1.api.v1.convenio.index","action":"MbCreditoCBO\Http\Controllers\Api\V1\ConvenioCallCenterController@index"},{"host":null,"methods":["GET","HEAD"],"uri":"api\/v1\/convenio\/create","name":"api.v1.api.v1.convenio.create","action":"MbCreditoCBO\Http\Controllers\Api\V1\ConvenioCallCenterController@create"},{"host":null,"methods":["POST"],"uri":"api\/v1\/convenio","name":"api.v1.api.v1.convenio.store","action":"MbCreditoCBO\Http\Controllers\Api\V1\ConvenioCallCenterController@store"},{"host":null,"methods":["GET","HEAD"],"uri":"api\/v1\/convenio\/{convenio}","name":"api.v1.api.v1.convenio.show","action":"MbCreditoCBO\Http\Controllers\Api\V1\ConvenioCallCenterController@show"},{"host":null,"methods":["GET","HEAD"],"uri":"api\/v1\/convenio\/{convenio}\/edit","name":"api.v1.api.v1.convenio.edit","action":"MbCreditoCBO\Http\Controllers\Api\V1\ConvenioCallCenterController@edit"},{"host":null,"methods":["PUT"],"uri":"api\/v1\/convenio\/{convenio}","name":"api.v1.api.v1.convenio.update","action":"MbCreditoCBO\Http\Controllers\Api\V1\ConvenioCallCenterController@update"},{"host":null,"methods":["PATCH"],"uri":"api\/v1\/convenio\/{convenio}","name":"api.v1.","action":"MbCreditoCBO\Http\Controllers\Api\V1\ConvenioCallCenterController@update"},{"host":null,"methods":["DELETE"],"uri":"api\/v1\/convenio\/{convenio}","name":"api.v1.api.v1.convenio.destroy","action":"MbCreditoCBO\Http\Controllers\Api\V1\ConvenioCallCenterController@destroy"},{"host":null,"methods":["GET","HEAD"],"uri":"api\/v1\/usuario","name":"api.v1.api.v1.usuario.index","action":"MbCreditoCBO\Http\Controllers\Api\V1\UsuarioController@index"},{"host":null,"methods":["GET","HEAD"],"uri":"api\/v1\/usuario\/create","name":"api.v1.api.v1.usuario.create","action":"MbCreditoCBO\Http\Controllers\Api\V1\UsuarioController@create"},{"host":null,"methods":["POST"],"uri":"api\/v1\/usuario","name":"api.v1.api.v1.usuario.store","action":"MbCreditoCBO\Http\Controllers\Api\V1\UsuarioController@store"},{"host":null,"methods":["GET","HEAD"],"uri":"api\/v1\/usuario\/{usuario}","name":"api.v1.api.v1.usuario.show","action":"MbCreditoCBO\Http\Controllers\Api\V1\UsuarioController@show"},{"host":null,"methods":["GET","HEAD"],"uri":"api\/v1\/usuario\/{usuario}\/edit","name":"api.v1.api.v1.usuario.edit","action":"MbCreditoCBO\Http\Controllers\Api\V1\UsuarioController@edit"},{"host":null,"methods":["PUT"],"uri":"api\/v1\/usuario\/{usuario}","name":"api.v1.api.v1.usuario.update","action":"MbCreditoCBO\Http\Controllers\Api\V1\UsuarioController@update"},{"host":null,"methods":["PATCH"],"uri":"api\/v1\/usuario\/{usuario}","name":"api.v1.","action":"MbCreditoCBO\Http\Controllers\Api\V1\UsuarioController@update"},{"host":null,"methods":["DELETE"],"uri":"api\/v1\/usuario\/{usuario}","name":"api.v1.api.v1.usuario.destroy","action":"MbCreditoCBO\Http\Controllers\Api\V1\UsuarioController@destroy"},{"host":null,"methods":["POST"],"uri":"oauth\/access_token","name":null,"action":"Closure"}],
            prefix: '/index.php',

            route : function (name, parameters, route) {
                route = route || this.getByName(name);

                if ( ! route ) {
                    return undefined;
                }

                return this.toRoute(route, parameters);
            },

            url: function (url, parameters) {
                parameters = parameters || [];

                var uri = url + '/' + parameters.join('/');

                return this.getCorrectUrl(uri);
            },

            toRoute : function (route, parameters) {
                var uri = this.replaceNamedParameters(route.uri, parameters);
                var qs  = this.getRouteQueryString(parameters);

                if (this.absolute && this.isOtherHost(route)){
                    return "//" + route.host + "/" + uri + qs;
                }

                return this.getCorrectUrl(uri + qs);
            },

            isOtherHost: function (route){
                return route.host && route.host != window.location.hostname;
            },

            replaceNamedParameters : function (uri, parameters) {
                uri = uri.replace(/\{(.*?)\??\}/g, function(match, key) {
                    if (parameters.hasOwnProperty(key)) {
                        var value = parameters[key];
                        delete parameters[key];
                        return value;
                    } else {
                        return match;
                    }
                });

                // Strip out any optional parameters that were not given
                uri = uri.replace(/\/\{.*?\?\}/g, '');

                return uri;
            },

            getRouteQueryString : function (parameters) {
                var qs = [];
                for (var key in parameters) {
                    if (parameters.hasOwnProperty(key)) {
                        qs.push(key + '=' + parameters[key]);
                    }
                }

                if (qs.length < 1) {
                    return '';
                }

                return '?' + qs.join('&');
            },

            getByName : function (name) {
                for (var key in this.routes) {
                    if (this.routes.hasOwnProperty(key) && this.routes[key].name === name) {
                        return this.routes[key];
                    }
                }
            },

            getByAction : function(action) {
                for (var key in this.routes) {
                    if (this.routes.hasOwnProperty(key) && this.routes[key].action === action) {
                        return this.routes[key];
                    }
                }
            },

            getCorrectUrl: function (uri) {
                var url = this.prefix + '/' + uri.replace(/^\/?/, '');

                if ( ! this.absolute) {
                    return url;
                }

                return this.rootUrl.replace('/\/?$/', '') + url;
            }
        };

        var getLinkAttributes = function(attributes) {
            if ( ! attributes) {
                return '';
            }

            var attrs = [];
            for (var key in attributes) {
                if (attributes.hasOwnProperty(key)) {
                    attrs.push(key + '="' + attributes[key] + '"');
                }
            }

            return attrs.join(' ');
        };

        var getHtmlLink = function (url, title, attributes) {
            title      = title || url;
            attributes = getLinkAttributes(attributes);

            return '<a href="' + url + '" ' + attributes + '>' + title + '</a>';
        };

        return {
            // Generate a url for a given controller action.
            // laroute.action('HomeController@getIndex', [params = {}])
            action : function (name, parameters) {
                parameters = parameters || {};

                return routes.route(name, parameters, routes.getByAction(name));
            },

            // Generate a url for a given named route.
            // laroute.route('routeName', [params = {}])
            route : function (route, parameters) {
                parameters = parameters || {};

                return routes.route(route, parameters);
            },

            // Generate a fully qualified URL to the given path.
            // laroute.route('url', [params = {}])
            url : function (route, parameters) {
                parameters = parameters || {};

                return routes.url(route, parameters);
            },

            // Generate a html link to the given url.
            // laroute.link_to('foo/bar', [title = url], [attributes = {}])
            link_to : function (url, title, attributes) {
                url = this.url(url);

                return getHtmlLink(url, title, attributes);
            },

            // Generate a html link to the given route.
            // laroute.link_to_route('route.name', [title=url], [parameters = {}], [attributes = {}])
            link_to_route : function (route, title, parameters, attributes) {
                var url = this.route(route, parameters);

                return getHtmlLink(url, title, attributes);
            },

            // Generate a html link to the given controller action.
            // laroute.link_to_action('HomeController@getIndex', [title=url], [parameters = {}], [attributes = {}])
            link_to_action : function(action, title, parameters, attributes) {
                var url = this.action(action, parameters);

                return getHtmlLink(url, title, attributes);
            }

        };

    }).call(this);

    /**
     * Expose the class either via AMD, CommonJS or the global object
     */
    if (typeof define === 'function' && define.amd) {
        define(function () {
            return laroute;
        });
    }
    else if (typeof module === 'object' && module.exports){
        module.exports = laroute;
    }
    else {
        window.laroute = laroute;
    }

}).call(this);

