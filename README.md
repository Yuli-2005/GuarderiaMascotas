# Examen - Desarrollo en Plataformas

## Caso 21 - Hospedaje de Mascotas
## Estudiante: Yulieth Galarza
## Fecha: 10/02/2026

---

## 1. Tabla 
### Nombre de la tabla: Hotel_mascotas

### Campos:

| Campo | Tipo | ¿Obligatorio? | Descripción |
|-------|------|----------------|-------------|
| id | BigInt (PK) | Sí | Identificador único autoincremental. |
| nombre_mascota | String (30) | Sí | Nombre del animal hospedado. |
| tipo_animal | String (50) | Sí | Especie (soporta selección y entrada manual). |
| nombre_propietario | String (50) | Sí | Nombre completo del dueño de la mascota. |
| telefono | String (10) | Sí | Teléfono de contacto (10 dígitos). |
| fecha_salida | Date | Sí | Fecha de retiro (Configurada: America/Guayaquil). |
| instrucciones_especiales | Text | No | Notas sobre cuidados o alimentación especial. |
| estado | Enum | Sí | Valores: 'hospedado' o 'recogido'. |
| created_at | Timestamp | Sí | Fecha de registro de ingreso automático. |
| updated_at | Timestamp | Sí | Fecha de última modificación automática. |

---

## 2. Tipos de Mascotas 
- Perro 
- Gato 
- Pájaro
- Conejo
- **Opción "Otro"**: permite ingresar especies 

---

## 3. ¿Se puede eliminar registros? 
**Respuesta:** Sí.

**Razón:** Se permite la eliminación física de registros para depurar datos obsoletos o erróneos del sistema, optimizando el almacenamiento cuando una mascota ya no frecuenta el hospedaje.

---

<img width="1859" height="870" alt="Captura de pantalla 2026-02-10 195820" src="https://github.com/user-attachments/assets/2e0c734d-5376-42a1-a090-33d43754f7e8" />
<img width="1864" height="857" alt="Captura de pantalla 2026-02-10 195850" src="https://github.com/user-attachments/assets/50847650-0615-4d8a-b555-880f482c50f7" />
<img width="1843" height="800" alt="Captura de pantalla 2026-02-10 195911" src="https://github.com/user-attachments/assets/76d517f5-7f74-4d6b-9011-2d63c9afa398" />
<img width="1858" height="852" alt="Captura de pantalla 2026-02-10 200012" src="https://github.com/user-attachments/assets/82683685-af70-40dd-ac1c-686a1d628148" />
<img width="1494" height="710" alt="Captura de pantalla 2026-02-10 200034" src="https://github.com/user-attachments/assets/bda203cd-27e3-466b-8ec3-c2b572b3c05d" />



---

## 5. Arquitectura del Proyecto (MVC)


1. **index()**: Listado general renderizado en tarjetas dinámicas.
2. **create() / store()**: Gestión del registro con validación de zona horaria ecuatoriana.
3. **show()**: Visualización del expediente detallado de la mascota.
4. **edit() / update()**: Gestión de actualizaciones y detección de especies personalizadas.
5. **updateMascotaRecogida()**: Método especializado para marcar la salida (estado: recogido).
6. **updateMascotaHospedado()**: Método especializado para marcar el re-ingreso (estado: hospedado).
7. **destroy()**: Eliminación física del registro de la mascota
