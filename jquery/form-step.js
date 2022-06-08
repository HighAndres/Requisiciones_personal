    $(document).ready(function() {

        //PRINCIPAL 
        $('#btn_principal_requi').click(function() {

            var error_empresa_solicitante = '';
            var error_centro_costos = '';
            var error_area_operativa = '';
            var error_tipo_de_personal = '';
            var error_puesto_solicitado = '';
            var error_personas_requeridas = '';
            var error_grado_estudios = '';
            var error_motivo_requisicion = '';
            var error_jefe_inmediato = '';

            if ($.trim($('#empresa_solicitante').val()).length == 0) {
                error_empresa_solicitante = 'La empresa solicitante es requerida';
                $('#error_empresa_solicitante').text(error_empresa_solicitante);
                $('#empresa_solicitante').addClass('has-error');
            } else {
                error_empresa_solicitante = '';
                $('#error_empresa_solicitante').text(error_empresa_solicitante);
                $('#empresa_solicitante').removeClass('has-error');
            }

            if ($.trim($('#centro_costos').val()).length == 0) {
                error_centro_costos = 'El centro de costos es requerido';
                $('#error_centro_costos').text(error_centro_costos);
                $('#centro_costos').addClass('has-error');

            } else {
                error_centro_costos = '';
                $('#error_centro_costos').text(error_centro_costos);
                $('#centro_costos').removeClass('has-error');
            }

            if ($.trim($('#area_operativa').val()).length == 0) {
                error_area_operativa = 'El área operativa es requerida';
                $('#error_area_operativa').text(error_area_operativa);
                $('.select2-selection--single').css({
                    "border": "1px solid #cc0000",
                    "backgroundColor": "#ffff99"
                });
            } else {
                error_area_operativa = '';
                $('#error_area_operativa').text(error_area_operativa);
                $('#area_operativa').removeClass('has-error');
                $('.select2-selection--single').css({
                    "border": "1px solid #ced4da",
                    "backgroundColor": "#fff"
                });
            }

            if ($.trim($('#tipo_de_personal').val()).length == 0) {
                error_tipo_de_personal = 'El tipo de personal requerido';
                $('#error_tipo_de_personal').text(error_tipo_de_personal);
                $('#tipo_de_personal').addClass('has-error');
            } else {
                error_area_operativa = '';
                $('#error_tipo_de_personal').text(error_tipo_de_personal);
                $('#tipo_de_personal').removeClass('has-error');
            }

            if ($.trim($('#puesto_solicitado').val()).length == 0) {
                error_puesto_solicitado = 'El puesto solicitado es requerido';
                $('#error_puesto_solicitado').text(error_puesto_solicitado);
                $('#puesto_solicitado').addClass('has-error');
            } else {
                error_puesto_solicitado = '';
                $('#error_puesto_solicitado').text(error_puesto_solicitado);
                $('#puesto_solicitado').removeClass('has-error');
            }

            if ($.trim($('#personas_requeridas').val()).length == 0) {
                error_personas_requeridas = 'El número de personas es requerido';
                $('#error_personas_requeridas').text(error_personas_requeridas);
                $('#personas_requeridas').addClass('has-error');
            } else if (+$('#personas_requeridas').val() < 1) {
                error_personas_requeridas = 'El número de personas requeridas no puede ser menor a 1';
                $('#error_personas_requeridas').text(error_personas_requeridas);
                $('#personas_requeridas').removeClass('has-error');
                $('#personas_requeridas').addClass('has-error');
            } else if (+$('#personas_requeridas').val() > 50) {
                error_personas_requeridas = 'El número de personas requeridas no puede ser mayor a 50';
                $('#error_personas_requeridas').text(error_personas_requeridas);
                $('#personas_requeridas').removeClass('has-error');
                $('#personas_requeridas').addClass('has-error');
            } else {
                error_personas_requeridas = '';
                $('#error_personas_requeridas').text(error_personas_requeridas);
                $('#personas_requeridas').removeClass('has-error');
            }

            if ($.trim($('#grado_estudios').val()).length == 0) {
                error_grado_estudios = 'El grado de estudios es requerido';
                $('#error_grado_estudios').text(error_grado_estudios);
                $('#grado_estudios').addClass('has-error');
            } else {
                error_grado_estudios = '';
                $('#error_grado_estudios').text(error_grado_estudios);
                $('#grado_estudios').removeClass('has-error');
            }

            if ($.trim($('#motivo_requisicion').val()).length == 0) {
                error_motivo_requisicion = 'El motivo de la requisición es requerido';
                $('#error_motivo_requisicion').text(error_motivo_requisicion);
                $('#motivo_requisicion').addClass('has-error');
            } else {
                error_motivo_requisicion = '';
                $('#error_motivo_requisicion').text(error_motivo_requisicion);
                $('#motivo_requisicion').removeClass('has-error');
            }
            
            if ($.trim($('#jefe_inmediato').val()).length == 0) {
                error_jefe_inmediato = 'El jefe inmediato es requerido';
                $('#error_jefe_inmediato').text(error_jefe_inmediato);
                $('#jefe_inmediato').addClass('has-error');
            } else {
                error_jefe_inmediato = '';
                $('#error_jefe_inmediato').text(error_jefe_inmediato);
                $('#jefe_inmediato').removeClass('has-error');
            }

            if (error_empresa_solicitante != '' || error_centro_costos != '' || error_area_operativa != '' || error_tipo_de_personal != '' || error_puesto_solicitado != '' || error_personas_requeridas != '' || error_grado_estudios != '' || error_motivo_requisicion != '' || error_jefe_inmediato != '') {
                return false;
            } else {
                $('#list_principal_requi').removeClass('active active_tab1');
                $('#list_principal_requi').removeAttr('href data-toggle');
                $('#principal_requi').removeClass('active');
                $('#list_principal_requi').addClass('inactive_tab1');
                $('#list_salarios_requi').removeClass('inactive_tab1');
                $('#list_salarios_requi').addClass('active_tab1 active');
                $('#list_salarios_requi').attr('href', '#salarios_requi');
                $('#list_salarios_requi').attr('data-toggle', 'tab');
                $('#salarios_requi').addClass('active in');
            }
        });

        //SALARIOS
        $('#previous_btn_salarios_requi').click(function() {
            $('#list_salarios_requi').removeClass('active active_tab1');
            $('#list_salarios_requi').removeAttr('href data-toggle');
            $('#salarios_requi').removeClass('active in');
            $('#list_salarios_requi').addClass('inactive_tab1');
            $('#list_principal_requi').removeClass('inactive_tab1');
            $('#list_principal_requi').addClass('active_tab1 active');
            $('#list_principal_requi').attr('href', '#principal_requi');
            $('#list_principal_requi').tab('show');
            $('#principal_requi').addClass('active in');
        });

        $('#btn_salarios_requi').click(function() {
            var error_cotizacion = '';
            var error_periodo = '';
            var error_salario_inicial = '';
            var error_salario_final = '';

            if ($.trim($('#cotizacion').val()).length == 0) {
                error_cotizacion = 'La cotización es requerida';
                $('#error_cotizacion').text(error_cotizacion);
                $('#cotizacion').addClass('has-error');
            } else {
                error_cotizacion = '';
                $('#error_cotizacion').text(error_cotizacion);
                $('#cotizacion').removeClass('has-error');
            }

            if ($.trim($('#periodo').val()).length == 0) {
                error_periodo = 'El periodo es requerido';
                $('#error_periodo').text(error_periodo);
                $('#periodo').addClass('has-error');
            } else {
                error_periodo = '';
                $('#error_periodo').text(error_periodo);
                $('#periodo').removeClass('has-error');
            }

            if ($.trim($('#salario_inicial').val()).length == 0) {
                error_salario_inicial = 'El salario es requerido';
                $('#error_salario_inicial').text(error_salario_inicial);
                $('#salario_inicial').addClass('has-error');
            } else if (+$('#salario_inicial').val() < '$1.00') {
                error_salario_inicial = 'El salario no puede ser menor a $1';
                $('#error_salario_inicial').text(error_salario_inicial);
                $('#salario_inicial').removeClass('has-error');
            } else if (+$('#salario_inicial').val() > 999999) {
                error_salario_inicial = 'El salario no puede ser mayor a $999999';
                $('#error_salario_inicial').text(error_salario_inicial);
                $('#salario_inicial').removeClass('has-error');
            } else {
                error_salario_inicial = '';
                $('#error_salario_inicial').text(error_salario_inicial);
                $('#salario_inicial').removeClass('has-error');
            }

            if ($.trim($('#salario_final').val()).length == 0) {
                error_salario_final = 'El salario es requerido';
                $('#error_salario_final').text(error_salario_final);
                $('#salario_final').addClass('has-error');
            } else {
                error_salario_final = '';
                $('#error_salario_final').text(error_salario_final);
                $('#salario_final').removeClass('has-error');
            }

            if (error_cotizacion != '' || error_periodo != '' || error_salario_inicial != '' || error_salario_final != '') {
                return false;
            } else {
                $('#list_salarios_requi').removeClass('active active_tab1');
                $('#list_salarios_requi').removeAttr('href data-toggle');
                $('#salarios_requi').removeClass('active');
                $('#list_salarios_requi').addClass('inactive_tab1');
                $('#list_datos_generales').removeClass('inactive_tab1');
                $('#list_datos_generales').addClass('active_tab1 active');
                $('#list_datos_generales').attr('href', '#datos_generales');
                $('#list_datos_generales').attr('data-toggle', 'tab');
                $('#datos_generales').addClass('active in');
            }
        });

        //DATOS GENERALES
        $('#previous_btn_datos_generales').click(function() {
            $('#list_datos_generales').removeClass('active active_tab1');
            $('#list_datos_generales').removeAttr('href data-toggle');
            $('#datos_generales').removeClass('active in');
            $('#list_datos_generales').addClass('inactive_tab1');
            $('#list_salarios_requi').removeClass('inactive_tab1');
            $('#list_salarios_requi').addClass('active_tab1 active');
            $('#list_salarios_requi').attr('href', '#salarios_requi');
            $('#list_salarios_requi').tab('show');
            $('#salarios_requi').addClass('active in');
        });

        $('#btn_datos_generales').click(function() {

            var error_genero_requerido = '';
            var error_estado_civil = '';
            var error_edad_minima = '';
            var error_edad_maxima = '';
            var error_licencia_conducir = '';
            var error_anios_experiencia = '';
            var error_rolar_turno = '';
            var error_trato_cli_prov = '';
            var error_manejo_personal = '';

            if ($.trim($('#genero_requerido').val()).length == 0) {
                error_genero_requerido = 'El de género es requerido';
                $('#error_genero_requerido').text(error_genero_requerido);
                $('#genero_requerido').addClass('has-error');
            } else {
                error_genero_requerido = '';
                $('#error_genero_requerido').text(error_genero_requerido);
                $('#genero_requerido').removeClass('has-error');
            }

            if ($.trim($('#estado_civil').val()).length == 0) {
                error_estado_civil = 'El estado civil es requerido';
                $('#error_estado_civil').text(error_estado_civil);
                $('#estado_civil').addClass('has-error');
            } else {
                error_estado_civil = '';
                $('#error_estado_civil').text(error_estado_civil);
                $('#estado_civil').removeClass('has-error');
            }

            if ($.trim($('#edad_minima').val()).length == 0) {
                error_edad_minima = 'La edad mínima es requerida';
                $('#error_edad_minima').text(error_edad_minima);
                $('#edad_minima').removeClass('has-error');
                $('#edad_minima').addClass('has-error');
            } else if (+$('#edad_minima').val() > 75) {
                error_edad_minima = 'La edad mínima no puede ser mayor a 75 años';
                $('#error_edad_minima').text(error_edad_minima);
                $('#edad_minima').removeClass('has-error');
                $('#edad_minima').addClass('has-error');
            } else if (+$('#edad_minima').val() < 18) {
                error_edad_minima = 'La edad mínima no puede ser menor a 18 años';
                $('#error_edad_minima').text(error_edad_minima);
                $('#edad_minima').removeClass('has-error');
                $('#edad_minima').addClass('has-error');
            } else {
                error_edad_minima = '';
                $('#error_edad_minima').text(error_edad_minima);
                $('#edad_minima').removeClass('has-error');
            }

            if ($.trim($('#edad_maxima').val()).length == 0) {
                error_edad_maxima = 'La edad máxima es requerida';
                $('#error_edad_maxima').text(error_edad_maxima);
                $('#edad_maxima').addClass('has-error');
            } else if (+$('#edad_maxima').val() > 75) {
                error_edad_maxima = 'La edad máxima no puede ser mayor a 75 años';
                $('#error_edad_maxima').text(error_edad_maxima);
                $('#edad_maxima').removeClass('has-error');
                $('#edad_maxima').addClass('has-error');
            } else if (+$('#edad_maxima').val() < 18) {
                error_edad_maxima = 'La edad máxima no puede ser menor a 18 años';
                $('#error_edad_maxima').text(error_edad_maxima);
                $('#edad_maxima').removeClass('has-error');
                $('#edad_maxima').addClass('has-error');
            } else {
                error_edad_maxima = '';
                $('#error_edad_maxima').text(error_edad_maxima);
                $('#edad_maxima').removeClass('has-error');
            }

            if ($.trim($('#licencia_conducir').val()).length == 0) {
                error_licencia_conducir = 'El dato de licencia de conducir es requerido';
                $('#error_licencia_conducir').text(error_licencia_conducir);
                $('#licencia_conducir').addClass('has-error');
            } else {
                error_licencia_conducir = '';
                $('#error_licencia_conducir').text(error_licencia_conducir);
                $('#licencia_conducir').removeClass('has-error');
            }

            if ($.trim($('#anios_experiencia').val()).length == 0) {
                error_anios_experiencia = 'Los años de experiencia son requeridos';
                $('#error_anios_experiencia').text(error_anios_experiencia);
                $('#anios_experiencia').addClass('has-error');
            } else {
                error_anios_experiencia = '';
                $('#error_anios_experiencia').text(error_anios_experiencia);
                $('#anios_experiencia').removeClass('has-error');
            }

            if ($.trim($('#rolar_turno').val()).length == 0) {
                error_rolar_turno = 'El dato de rolar turnos es requerido';
                $('#error_rolar_turno').text(error_rolar_turno);
                $('#rolar_turno').addClass('has-error');
            } else {
                error_rolar_turno = '';
                $('#error_rolar_turno').text(error_rolar_turno);
                $('#rolar_turno').removeClass('has-error');
            }

            if ($.trim($('#trato_cli_prov').val()).length == 0) {
                error_trato_cli_prov = 'El trato con clientes o proveedores es requerido';
                $('#error_trato_cli_prov').text(error_trato_cli_prov);
                $('#trato_cli_prov').addClass('has-error');
            } else {
                error_trato_cli_prov = '';
                $('#error_trato_cli_prov').text(error_trato_cli_prov);
                $('#trato_cli_prov').removeClass('has-error');
            }

            if ($.trim($('#manejo_personal').val()).length == 0) {
                error_manejo_personal = 'El manejo de personal es requerido';
                $('#error_manejo_personal').text(error_manejo_personal);
                $('#manejo_personal').addClass('has-error');
            } else {
                error_manejo_personal = '';
                $('#error_manejo_personal').text(error_manejo_personal);
                $('#manejo_personal').removeClass('has-error');
            }

            if (error_genero_requerido != '' || error_estado_civil != '' || error_edad_minima != '' || error_edad_maxima != '' || error_licencia_conducir != '' || error_anios_experiencia != '' || error_rolar_turno != '' || error_trato_cli_prov != '' || error_manejo_personal != '') {
                return false;
            } else {
                $('#list_datos_generales').removeClass('active active_tab1');
                $('#list_datos_generales').removeAttr('href data-toggle');
                $('#datos_generales').removeClass('active');
                $('#list_datos_generales').addClass('inactive_tab1');
                $('#list_jornada_laboral').removeClass('inactive_tab1');
                $('#list_jornada_laboral').addClass('active_tab1 active');
                $('#list_jornada_laboral').attr('href', '#jornada_laboral');
                $('#list_jornada_laboral').tab('show');
                $('#jornada_laboral').addClass('active in');
            }
        });

        //JORNADA LABORAL
        $('#previous_btn_jornada_laboral').click(function() {
            $('#list_jornada_laboral').removeClass('active active_tab1');
            $('#list_jornada_laboral').removeAttr('href data-toggle');
            $('#jornada_laboral').removeClass('active in');
            $('#list_jornada_laboral').addClass('inactive_tab1');
            $('#list_datos_generales').removeClass('inactive_tab1');
            $('#list_datos_generales').addClass('active_tab1 active');
            $('#list_datos_generales').attr('href', '#salarios_requi');
            $('#list_datos_generales').attr('data-toggle', 'nav');
            $('#datos_generales').addClass('active in');
        });

        $('#btn_jornada_laboral').click(function() {
            var error_jornada = '';
            var error_horario_inicial = '';
            var error_horario_final = '';

            if ($.trim($('#jornada').val()).length == 0) {
                error_jornada = 'La jornada es requerida';
                $('#error_jornada').text(error_jornada);
                $('#jornada').addClass('has-error');
            } else {
                error_jornada = '';
                $('#error_jornada').text(error_jornada);
                $('#jornada').removeClass('has-error');
            }

            if ($.trim($('#horario_inicial').val()).length == 0) {
                error_horario_inicial = 'El dato de horario inicial es requerido';
                $('#error_horario_inicial').text(error_horario_inicial);
                $('#horario_inicial').addClass('has-error');
            } else {
                error_horario_inicial = '';
                $('#error_horario_inicial').text(error_horario_inicial);
                $('#horario_inicial').removeClass('has-error');
            }

            if ($.trim($('#horario_final').val()).length == 0) {
                error_horario_final = 'El dato de horario final es requerido';
                $('#error_horario_final').text(error_horario_final);
                $('#horario_final').addClass('has-error');
            } else {
                error_horario_final = '';
                $('#error_horario_final').text(error_horario_final);
                $('#horario_final').removeClass('has-error');
            }

            if (error_jornada != '' || error_horario_inicial != '' || error_horario_final != '') {
                return false;
            } else {
                $('#list_jornada_laboral').removeClass('active active_tab1');
                $('#list_jornada_laboral').removeAttr('href data-toggle');
                $('#jornada_laboral').removeClass('active');
                $('#list_jornada_laboral').addClass('inactive_tab1');
                $('#list_conocimientos').removeClass('inactive_tab1');
                $('#list_conocimientos').addClass('active_tab1 active');
                $('#list_conocimientos').attr('href', '#conocimientos');
                $('#list_conocimientos').attr('data-toggle', 'tab');
                $('#conocimientos').addClass('active in');
            }
        });

        //PRINCIPALES CONOCIMIENTOS
        $('#previous_btn_conocimientos').click(function() {
            $('#list_conocimientos').removeClass('active active_tab1');
            $('#list_conocimientos').removeAttr('href data-toggle');
            $('#conocimientos').removeClass('active in');
            $('#list_conocimientos').addClass('inactive_tab1');
            $('#list_jornada_laboral').removeClass('inactive_tab1');
            $('#list_jornada_laboral').addClass('active_tab1 active');
            $('#list_jornada_laboral').attr('href', '#jornada_laboral');
            $('#list_jornada_laboral').attr('data-toggle', 'tab');
            $('#jornada_laboral').addClass('active in');
        });

        $('#btn_conocimientos').click(function() {
            var error_conocimiento_1 = '';
            var error_conocimiento_2 = '';
            var error_conocimiento_3 = '';
            var error_conocimiento_4 = '';
            var error_conocimiento_5 = '';

            if ($.trim($('#conocimiento_1').val()).length == 0) {
                error_conocimiento_1 = 'Es necesario ingresar el primer conocimiento';
                $('#error_conocimiento_1').text(error_conocimiento_1);
                $('#conocimiento_1').addClass('has-error');
            } else {
                error_conocimiento_1 = '';
                $('#error_conocimiento_1').text(error_conocimiento_1);
                $('#conocimiento_1').removeClass('has-error');
            }

            if ($.trim($('#conocimiento_2').val()).length == 0) {
                error_conocimiento_2 = 'Es necesario ingresar el segundo conocimiento';
                $('#error_conocimiento_2').text(error_conocimiento_2);
                $('#conocimiento_2').addClass('has-error');
            } else {
                error_conocimiento_2 = '';
                $('#error_conocimiento_2').text(error_conocimiento_2);
                $('#conocimiento_2').removeClass('has-error');
            }

            if ($.trim($('#conocimiento_3').val()).length == 0) {
                error_conocimiento_3 = 'Es necesario ingresar el tercer conocimiento';
                $('#error_conocimiento_3').text(error_conocimiento_3);
                $('#conocimiento_3').addClass('has-error');
            } else {
                error_conocimiento_3 = '';
                $('#error_conocimiento_3').text(error_conocimiento_3);
                $('#conocimiento_3').removeClass('has-error');
            }

            if ($.trim($('#conocimiento_4').val()).length == 0) {
                error_conocimiento_4 = 'Es necesario ingresar el cuarto conocimiento';
                $('#error_conocimiento_4').text(error_conocimiento_4);
                $('#conocimiento_4').addClass('has-error');
            } else {
                error_conocimiento_4 = '';
                $('#error_conocimiento_4').text(error_conocimiento_4);
                $('#conocimiento_4').removeClass('has-error');
            }

            if ($.trim($('#conocimiento_5').val()).length == 0) {
                error_conocimiento_5 = 'Es necesario ingresar el quinto conocimiento';
                $('#error_conocimiento_5').text(error_conocimiento_5);
                $('#conocimiento_5').addClass('has-error');
            } else {
                error_conocimiento_5 = '';
                $('#error_conocimiento_5').text(error_conocimiento_5);
                $('#conocimiento_5').removeClass('has-error');
            }

            if (error_conocimiento_1 != '' || error_conocimiento_2 != '' || error_conocimiento_3 != '' || error_conocimiento_4 != '' || error_conocimiento_5 != '') {
                return false;
            } else {
                $('#list_conocimientos').removeClass('active active_tab1');
                $('#list_conocimientos').removeAttr('href data-toggle');
                $('#conocimientos').removeClass('active');
                $('#list_conocimientos').addClass('inactive_tab1');
                $('#list_competencias_requi').removeClass('inactive_tab1');
                $('#list_competencias_requi').addClass('active_tab1 active');
                $('#list_competencias_requi').attr('href', '#competencias_requi');
                $('#list_competencias_requi').attr('data-toggle', 'tab');
                $('#competencias_requi').addClass('active in');
            }
        });

        //COMPETENCIAS
        $('#previous_btn_competencias_requi').click(function() {
            $('#list_competencias_requi').removeClass('active active_tab1');
            $('#list_competencias_requi').removeAttr('href data-toggle');
            $('#competencias_requi').removeClass('active in');
            $('#list_competencias_requi').addClass('inactive_tab1');
            $('#list_conocimientos').removeClass('inactive_tab1');
            $('#list_conocimientos').addClass('active_tab1 active');
            $('#list_conocimientos').attr('href', '#conocimientos');
            $('#list_conocimientos').attr('data-toggle', 'tab');
            $('#conocimientos').addClass('active in');
        });

        $('#btn_competencias_requi').click(function() {
            var error_competencia_1 = '';
            var error_competencia_2 = '';
            var error_competencia_3 = '';
            var error_competencia_4 = '';
            var error_competencia_5 = '';

            if ($.trim($('#competencia_1').val()).length == 0) {
                error_competencia_1 = 'Es necesario ingresar la primer competencia';
                $('#error_competencia_1').text(error_competencia_1);
                $('#competencia_1').addClass('has-error');
            } else {
                error_competencia_1 = '';
                $('#error_competencia_1').text(error_competencia_1);
                $('#competencia_1').removeClass('has-error');
            }

            if ($.trim($('#competencia_2').val()).length == 0) {
                error_competencia_2 = 'Es necesario ingresar la segunda competencia';
                $('#error_competencia_2').text(error_competencia_2);
                $('#competencia_2').addClass('has-error');
            } else {
                error_competencia_2 = '';
                $('#error_competencia_2').text(error_competencia_2);
                $('#competencia_2').removeClass('has-error');
            }

            if ($.trim($('#competencia_3').val()).length == 0) {
                error_competencia_3 = 'Es necesario ingresar la tercer competencia';
                $('#error_competencia_3').text(error_competencia_3);
                $('#competencia_3').addClass('has-error');
            } else {
                error_competencia_3 = '';
                $('#error_competencia_3').text(error_competencia_3);
                $('#competencia_3').removeClass('has-error');
            }

            if ($.trim($('#competencia_4').val()).length == 0) {
                error_competencia_4 = 'Es necesario ingresar la cuarta competencia';
                $('#error_competencia_4').text(error_competencia_4);
                $('#competencia_4').addClass('has-error');
            } else {
                error_competencia_4 = '';
                $('#error_competencia_4').text(error_competencia_4);
                $('#competencia_4').removeClass('has-error');
            }

            if ($.trim($('#competencia_5').val()).length == 0) {
                error_competencia_5 = 'Es necesario ingresar la quinta competencia';
                $('#error_competencia_5').text(error_competencia_5);
                $('#competencia_5').addClass('has-error');
            } else {
                error_competencia_5 = '';
                $('#error_competencia_5').text(error_competencia_5);
                $('#competencia_5').removeClass('has-error');
            }

            if (error_competencia_1 != '' || error_competencia_2 != '' || error_competencia_3 != '' || error_competencia_4 != '' || error_competencia_5 != '') {
                return false;
            } else {
                $('#list_competencias_requi').removeClass('active active_tab1');
                $('#list_competencias_requi').removeAttr('href data-toggle');
                $('#competencias_requi').removeClass('active');
                $('#list_competencias_requi').addClass('inactive_tab1');
                $('#list_actividades').removeClass('inactive_tab1');
                $('#list_actividades').addClass('active_tab1 active');
                $('#list_actividades').attr('href', '#actividades');
                $('#list_actividades').attr('data-toggle', 'nav');
                $('#actividades').addClass('active in');
            }
        });

        //PRINCIPALES ACTIVIDADES
        $('#previous_btn_actividades').click(function() {
            $('#list_actividades').removeClass('active active_tab1');
            $('#list_actividades').removeAttr('href data-toggle');
            $('#actividades').removeClass('active in');
            $('#list_actividades').addClass('inactive_tab1');
            $('#list_competencias_requi').removeClass('inactive_tab1');
            $('#list_competencias_requi').addClass('active_tab1 active');
            $('#list_competencias_requi').attr('href', '#competencias_requi');
            $('#list_competencias_requi').attr('data-toggle', 'nav');
            $('#competencias_requi').addClass('active in');
        });

        $('#btn_actividades').click(function() {
            var error_actividad_1 = '';
            var error_actividad_2 = '';
            var error_actividad_3 = '';
            var error_actividad_4 = '';
            var error_actividad_5 = '';

            if ($.trim($('#actividad_1').val()).length == 0) {
                error_actividad_1 = 'Es necesario ingresar la primer actividad';
                $('#error_actividad_1').text(error_actividad_1);
                $('#actividad_1').addClass('has-error');
            } else {
                error_actividad_1 = '';
                $('#error_actividad_1').text(error_actividad_1);
                $('#actividad_1').removeClass('has-error');
            }

            if ($.trim($('#actividad_2').val()).length == 0) {
                error_actividad_2 = 'Es necesario ingresar la segunda actividad';
                $('#error_actividad_2').text(error_actividad_2);
                $('#actividad_2').addClass('has-error');
            } else {
                error_actividad_2 = '';
                $('#error_actividad_2').text(error_actividad_2);
                $('#actividad_2').removeClass('has-error');
            }

            if ($.trim($('#actividad_3').val()).length == 0) {
                error_actividad_3 = 'Es necesario ingresar la tercer actividad';
                $('#error_actividad_3').text(error_actividad_3);
                $('#actividad_3').addClass('has-error');
            } else {
                error_actividad_3 = '';
                $('#error_actividad_3').text(error_actividad_3);
                $('#actividad_3').removeClass('has-error');
            }

            if ($.trim($('#actividad_4').val()).length == 0) {
                error_actividad_4 = 'Es necesario ingresar la cuarta actividad';
                $('#error_actividad_4').text(error_actividad_4);
                $('#actividad_4').addClass('has-error');
            } else {
                error_actividad_4 = '';
                $('#error_actividad_4').text(error_actividad_4);
                $('#actividad_4').removeClass('has-error');
            }

            if ($.trim($('#actividad_5').val()).length == 0) {
                error_actividad_5 = 'Es necesario ingresar la quinta actividad';
                $('#error_actividad_5').text(error_actividad_5);
                $('#actividad_5').addClass('has-error');
            } else {
                error_actividad_5 = '';
                $('#error_actividad_5').text(error_actividad_5);
                $('#actividad_5').removeClass('has-error');
            }

            if (error_actividad_1 != '' || error_actividad_2 != '' || error_actividad_3 != '' || error_actividad_4 != '' || error_actividad_5 != '') {
                return false;
            } else {
                $('#btn_actividades').attr("disabled", "disabled");
                $('html,body').css('cursor','progress');
                $("#register_form").submit();
            }
        });
    });