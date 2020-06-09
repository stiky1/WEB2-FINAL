<?php
    $lang = array(
        "welcome" => "Welcome, everyone ",
        "lang" => "Languages",
        "home" => "Home",
        "pendulum" => "Inverted pendulum",
        "ball" => "Beam and ball",
        "car" => "Suspension car system",
        "airplane" => "Aircraft pitch control",
        "graph" => "Graph",
        "animation" => "Animation",
        "submit" => "Submit",
        "const" => "Set r value:",
        "console" => "Console",
        "command" => "Type expession here and press Submit",
        "export" => "Export file with commands",
        "stats" => "Statistics of pages attendance",
        "api_stats" => "Statistics",
        "airplane_graph_tr1" => "• Tilt of the plane",
        "airplane_graph_tr2" => "• Tilt of the flap",
        "airplane_input_tooltip" => "'r' value should be between -1.0 and 1.0.",
        "suspension_graph_tr1" => "• Car bodywork",
        "suspension_graph_tr2" => "• Wheel",
        "suspension_input_tooltip" => "'r' value should be between -0.4 and 0.4.",
        "pendulum_graph_tr1" => "• ",
        "pendulum_graph_tr2" => "• ",
        "pendulum_input_tooltip" => "",
        "ball_graph_tr1" => "• ",
        "ball_graph_tr2" => "• ",
        "ball_input_tooltip" => "",
        "tooltip" => "When you change the language, your work will be lost.",
        "submit_stat" => "Send statistics",
        "airplane_angle" => "Tilt of the airplane: ",
        "lang_uloha" => "Languages",
        "page_design_uloha" => "WEB design",
        "stat_design_uloha" => "Statistics design",
        "console_uloha" => "Console page, logs",
        "csv_uloha" => "CSV/PDF export",
        "api_uloha" => "API page",
        "mail_uloha" => "Send statistics to e-mail",
        "gcko" => "Beast G-class car model",
        "schedule" => "Work schedule",
        "octave" => "Octave install/set-up",
        "description" => "Description",
        "parameters" => "Parameters",
        "response" => "API response",
        "description_continue" => "returns json with the values specified for",
        "parameters_pendulum" => "api key, name of the function - \"pendulum\", parameters for CAS",
        "response_pendulum" => "{ time[], pendulum position[], tilt of the vertical rod[] }",
        "parameters_ball" => "api key, name of the function - \"ball\", parameters for CAS",
        "response_ball" => "{ time[], ball position[], tilt of the rod[] }",
        "parameters_car" => "api key, name of the function - \"suspension\", parameters for CAS",
        "response_car" => "{ time[], car position[], wheel position[] }",
        "parameters_airplane" => "api key, name of the function - \"airplane\", parameters for CAS",
        "response_airplane" => "{ time[], airplane tilt[], tilt of the rear flap[] }",
        "description_stats1" => "returns json with the values from the database of Statistics of pages attendance",
        "description_stats2" => "updates Statistics of pages attendance in the database",
        "description_stats3" => "sends email with statistics to the specified email address",
        "parameters_stats1" => "api key, name of the function - \"getStat\" ",
        "parameters_stats2" => "api key, name of the function - \"incStat\", parameter for the function(page name)",
        "parameters_stats3" => "api key, name of the function - \"sendMail\", parameters for the function(email adress)",
        "response_stats1" => "{ page name: count, ... }",
        "response_stats2" => "{ true - if everything works }",
        "description_console" => "returns json with the result for the specified command, which was calculated by CAS",
        "parameters_console" => "api key, name of the function - \"cmd\", parameter - command for CAS",
        "response_console" => "{ result from the CAS for the specified command }",
    );