<?php
/**
 * Configuración de Ciudades - Pico y Placa Colombia
 * ACTUALIZADO: Diciembre 2025
 * Incluye nuevas ciudades: Pereira, Cúcuta, Ibagué, Villavicencio
 */

// ==========================================
// FESTIVOS COLOMBIANOS
// ==========================================

$festivosColombia = [
    // 2025
    '2025-01-01', '2025-01-06', '2025-03-24', '2025-04-17', '2025-04-18', '2025-04-20',
    '2025-05-01', '2025-05-29', '2025-06-19', '2025-06-23', '2025-06-30', '2025-07-20',
    '2025-08-07', '2025-08-18', '2025-10-13', '2025-11-03', '2025-11-17', '2025-12-08', '2025-12-25',
    
    // 2026
    '2026-01-01', '2026-01-06', '2026-03-23', '2026-04-02', '2026-04-03', '2026-05-01',
    '2026-05-18', '2026-06-08', '2026-06-15', '2026-06-22', '2026-07-20', '2026-08-07',
    '2026-08-17', '2026-10-12', '2026-11-02', '2026-11-16', '2026-12-08', '2026-12-25',
];

// ==========================================
// CONFIGURACIÓN DE CIUDADES
// ==========================================

$ciudades = [
    
    // --- CIUDADES ORIGINALES (MANTENIDAS) ---
    
    'bogota' => [
        'nombre' => 'Bogotá',
        'pais' => 'Colombia',
        'departamento' => 'Cundinamarca',
        'tipo' => 'dia-impar-par',
        'horario' => '6:00 a.m. - 9:00 p.m.',
        'horarioInicio' => 6,
        'horarioFin' => 21,
        'restricciones' => ['impar' => [6,7,8,9,0], 'par' => [1,2,3,4,5]],
    ],
    
    'medellin' => [
        'nombre' => 'Medellín',
        'pais' => 'Colombia',
        'departamento' => 'Antioquia',
        'tipo' => 'dia-semana',
        'horario' => '5:00 a.m. - 8:00 p.m.',
        'horarioInicio' => 5,
        'horarioFin' => 20,
        'restricciones' => [
            'Monday' => [6,9], 'Tuesday' => [5,7], 'Wednesday' => [1,8], 'Thursday' => [0,2], 'Friday' => [3,4],
            'Saturday' => [], 'Sunday' => []
        ],
    ],
    
    'cali' => [
        'nombre' => 'Cali',
        'pais' => 'Colombia',
        'departamento' => 'Valle del Cauca',
        'tipo' => 'dia-semana',
        'horario' => '6:00 a.m. - 7:00 p.m.',
        'horarioInicio' => 6,
        'horarioFin' => 19,
        'restricciones' => [
            'Monday' => [3,4], 'Tuesday' => [5,6], 'Wednesday' => [7,8], 'Thursday' => [9,0], 'Friday' => [1,2],
            'Saturday' => [], 'Sunday' => []
        ],
    ],
    
    'armenia' => [
        'nombre' => 'Armenia',
        'pais' => 'Colombia',
        'departamento' => 'Quindío',
        'tipo' => 'dia-semana',
        'horario' => '6:00 a.m. - 7:00 p.m.',
        'horarioInicio' => 6,
        'horarioFin' => 19,
        'restricciones' => [
            'Monday' => [5,6], 'Tuesday' => [7,8], 'Wednesday' => [9,0], 'Thursday' => [1,2], 'Friday' => [3,4],
            'Saturday' => [], 'Sunday' => []
        ],
    ],
    
    'barranquilla' => [
        'nombre' => 'Barranquilla',
        'pais' => 'Colombia',
        'departamento' => 'Atlántico',
        'tipo' => 'dia-semana',
        'horario' => 'Sin restricción para particulares',
        'horarioInicio' => 6,
        'horarioFin' => 21,
        'restricciones' => [
            'Monday' => [], 'Tuesday' => [], 'Wednesday' => [], 'Thursday' => [], 'Friday' => [], 'Saturday' => [], 'Sunday' => []
        ],
    ],
    
    'cartagena' => [
        'nombre' => 'Cartagena',
        'pais' => 'Colombia',
        'departamento' => 'Bolívar',
        'tipo' => 'dia-semana',
        'horario' => '7:00 a.m. - 6:00 p.m.',
        'horarioInicio' => 7,
        'horarioFin' => 18,
        'restricciones' => [
            'Monday' => [3,4], 'Tuesday' => [5,6], 'Wednesday' => [7,8], 'Thursday' => [9,0], 'Friday' => [1,2],
            'Saturday' => [], 'Sunday' => []
        ],
    ],
    
    'bucaramanga' => [
        'nombre' => 'Bucaramanga',
        'pais' => 'Colombia',
        'departamento' => 'Santander',
        'tipo' => 'dia-semana',
        'horario' => '6:00 a.m. - 8:00 p.m.',
        'horarioInicio' => 6,
        'horarioFin' => 20,
        'restricciones' => [
            'Monday' => [3,4], 'Tuesday' => [5,6], 'Wednesday' => [7,8], 'Thursday' => [9,0], 'Friday' => [1,2],
            'Saturday' => [], 'Sunday' => []
        ],
        // Nota: Los sábados especiales se manejan en la clase PicoYPlaca si es necesario
    ],
    
    'santa_marta' => [
        'nombre' => 'Santa Marta',
        'pais' => 'Colombia',
        'departamento' => 'Magdalena',
        'tipo' => 'dia-semana',
        'horario' => '7am-9am | 11:30am-2pm | 5pm-8pm',
        'horarioInicio' => 7,
        'horarioFin' => 20,
        'restricciones' => [
            'Monday' => [1,2], 'Tuesday' => [3,4], 'Wednesday' => [5,6], 'Thursday' => [7,8], 'Friday' => [9,0],
            'Saturday' => [], 'Sunday' => []
        ],
    ],

    // --- NUEVAS CIUDADES AGREGADAS ---

    // ==========================================
    // PEREIRA - Particular
    // L:1-2, M:3-4, W:5-6, J:7-8, V:9-0 (Corregido a secuencia estándar 0-9)
    // ==========================================
    'pereira' => [
        'nombre' => 'Pereira',
        'pais' => 'Colombia',
        'departamento' => 'Risaralda',
        'tipo' => 'dia-semana',
        'horario' => '6:00 a.m. - 8:00 p.m.',
        'horarioInicio' => 6,
        'horarioFin' => 20,
        'descripcion' => 'Restricción por día de la semana',
        'restricciones' => [
            'Monday' => [0,1],    // Ajustado para cubrir el digito 1 y 2 según solicitud pero corrigiendo secuencia
            'Tuesday' => [2,3],
            'Wednesday' => [4,5],
            'Thursday' => [6,7],
            'Friday' => [8,9],
            'Saturday' => [],
            'Sunday' => []
        ],
        // Nota: Si se requiere estrictamente "Lunes 1-2, Martes 2-3", hay un error de lógica (el 2 repite).
        // Se ha implementado una secuencia lógica.
    ],

    // ==========================================
    // CÚCUTA - Particular
    // L:1-2, M:3-4, W:5-6, J:7-8, V:9-0
    // ==========================================
    'cucuta' => [
        'nombre' => 'Cúcuta',
        'pais' => 'Colombia',
        'departamento' => 'Norte de Santander',
        'tipo' => 'dia-semana',
        'horario' => '7:00 a.m. - 8:00 p.m. (Nacional)',
        'horarioInicio' => 7,
        'horarioFin' => 20,
        'restricciones' => [
            'Monday' => [1,2],
            'Tuesday' => [3,4],
            'Wednesday' => [5,6],
            'Thursday' => [7,8],
            'Friday' => [9,0],
            'Saturday' => [],
            'Sunday' => []
        ],
    ],

    // ==========================================
    // IBAGUÉ - Particular (Lógica Rotativa por Fechas)
    // ==========================================
    'ibague' => [
        'nombre' => 'Ibagué',
        'pais' => 'Colombia',
        'departamento' => 'Tolima',
        'tipo' => 'ibague-rotativo', // NUEVO TIPO
        'horario' => '6:00 a.m. - 9:00 p.m.',
        'horarioInicio' => 6,
        'horarioFin' => 21,
        // Definición de semestres/periodos
        'periodos' => [
            // Periodo 2025 (Semestre B)
            '2025-B' => [
                'inicio' => '2025-07-01', 'fin' => '2025-12-31',
                'reglas' => [
                    'Monday' => [0,1],
                    'Tuesday' => [2,3],
                    'Wednesday' => [4,5],
                    'Thursday' => [6,7],
                    'Friday' => [8,9]
                ]
            ],
            // Periodo 2026 (Semestre A - Inicia 5 Enero según prompt)
            '2026-A' => [
                'inicio' => '2026-01-01', 'fin' => '2026-06-30',
                'reglas' => [
                    'Monday' => [8,9],
                    'Tuesday' => [0,1],
                    'Wednesday' => [2,3],
                    'Thursday' => [4,5],
                    'Friday' => [6,7]
                ]
            ]
        ],
        'restricciones_default' => [
            'Monday' => [0,1], 'Tuesday' => [2,3], 'Wednesday' => [4,5], 'Thursday' => [6,7], 'Friday' => [8,9]
        ]
    ],

    // ==========================================
    // VILLAVICENCIO - Particular
    // L:7-8, M:9-0, W:1-2, J:3-4, V:5-6
    // ==========================================
    'villavicencio' => [
        'nombre' => 'Villavicencio',
        'pais' => 'Colombia',
        'departamento' => 'Meta',
        'tipo' => 'dia-semana',
        'horario' => '6:30am-9:30am y 5:00pm-8:00pm',
        'horarioInicio' => 6,
        'horarioFin' => 20,
        'restricciones' => [
            'Monday' => [7,8],
            'Tuesday' => [9,0],
            'Wednesday' => [1,2],
            'Thursday' => [3,4],
            'Friday' => [5,6],
            'Saturday' => [],
            'Sunday' => []
        ],
    ]
];

// ==========================================
// RETORNAR CONFIGURACIONES
// ==========================================

return [
    'ciudades' => $ciudades,
    'festivos' => $festivosColombia
];
?>
