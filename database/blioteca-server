--
-- PostgreSQL database cluster dump
--

-- Started on 2025-06-05 02:02:47 UTC

SET default_transaction_read_only = off;

SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;

--
-- Roles
--

CREATE ROLE admin;
ALTER ROLE admin WITH SUPERUSER INHERIT CREATEROLE CREATEDB LOGIN REPLICATION BYPASSRLS PASSWORD 'SCRAM-SHA-256$4096:O1CGalTNOWlmInYSpCsjWQ==$0ByWclN7iOlFZGhMkKTGAUR4rqz6SZ76qrA8HAPfGQo=:BQ3Xi0yXS0Vjy4PGKktSoHcDA2UpKzzSTYD13RhMLvg=';

--
-- User Configurations
--








--
-- Databases
--

--
-- Database "template1" dump
--

\connect template1

--
-- PostgreSQL database dump
--

-- Dumped from database version 15.13 (Debian 15.13-1.pgdg120+1)
-- Dumped by pg_dump version 15.13

-- Started on 2025-06-05 02:02:47 UTC

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

-- Completed on 2025-06-05 02:02:48 UTC

--
-- PostgreSQL database dump complete
--

--
-- Database "admin" dump
--

--
-- PostgreSQL database dump
--

-- Dumped from database version 15.13 (Debian 15.13-1.pgdg120+1)
-- Dumped by pg_dump version 15.13

-- Started on 2025-06-05 02:02:48 UTC

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

--
-- TOC entry 3341 (class 1262 OID 16384)
-- Name: admin; Type: DATABASE; Schema: -; Owner: admin
--

CREATE DATABASE admin WITH TEMPLATE = template0 ENCODING = 'UTF8' LOCALE_PROVIDER = libc LOCALE = 'en_US.utf8';


ALTER DATABASE admin OWNER TO admin;

\connect admin

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

-- Completed on 2025-06-05 02:02:48 UTC

--
-- PostgreSQL database dump complete
--

--
-- Database "biblioteca" dump
--

--
-- PostgreSQL database dump
--

-- Dumped from database version 15.13 (Debian 15.13-1.pgdg120+1)
-- Dumped by pg_dump version 15.13

-- Started on 2025-06-05 02:02:48 UTC

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

--
-- TOC entry 3478 (class 1262 OID 16389)
-- Name: biblioteca; Type: DATABASE; Schema: -; Owner: admin
--

CREATE DATABASE biblioteca WITH TEMPLATE = template0 ENCODING = 'UTF8' LOCALE_PROVIDER = libc LOCALE = 'en_US.utf8';


ALTER DATABASE biblioteca OWNER TO admin;

\connect biblioteca

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- TOC entry 232 (class 1259 OID 16483)
-- Name: assuntos; Type: TABLE; Schema: public; Owner: admin
--

CREATE TABLE public.assuntos (
    cod_as bigint NOT NULL,
    descricao character varying(20) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.assuntos OWNER TO admin;

--
-- TOC entry 231 (class 1259 OID 16482)
-- Name: assuntos_cod_as_seq; Type: SEQUENCE; Schema: public; Owner: admin
--

CREATE SEQUENCE public.assuntos_cod_as_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.assuntos_cod_as_seq OWNER TO admin;

--
-- TOC entry 3479 (class 0 OID 0)
-- Dependencies: 231
-- Name: assuntos_cod_as_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: admin
--

ALTER SEQUENCE public.assuntos_cod_as_seq OWNED BY public.assuntos.cod_as;


--
-- TOC entry 230 (class 1259 OID 16476)
-- Name: autores; Type: TABLE; Schema: public; Owner: admin
--

CREATE TABLE public.autores (
    cod_au bigint NOT NULL,
    nome character varying(100) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.autores OWNER TO admin;

--
-- TOC entry 229 (class 1259 OID 16475)
-- Name: autores_cod_au_seq; Type: SEQUENCE; Schema: public; Owner: admin
--

CREATE SEQUENCE public.autores_cod_au_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.autores_cod_au_seq OWNER TO admin;

--
-- TOC entry 3480 (class 0 OID 0)
-- Dependencies: 229
-- Name: autores_cod_au_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: admin
--

ALTER SEQUENCE public.autores_cod_au_seq OWNED BY public.autores.cod_au;


--
-- TOC entry 234 (class 1259 OID 16504)
-- Name: livro_assunto; Type: TABLE; Schema: public; Owner: admin
--

CREATE TABLE public.livro_assunto (
    livro_codl bigint NOT NULL,
    assunto_cod_as bigint NOT NULL
);


ALTER TABLE public.livro_assunto OWNER TO admin;

--
-- TOC entry 233 (class 1259 OID 16489)
-- Name: livro_autor; Type: TABLE; Schema: public; Owner: admin
--

CREATE TABLE public.livro_autor (
    livro_codl bigint NOT NULL,
    autor_cod_au bigint NOT NULL
);


ALTER TABLE public.livro_autor OWNER TO admin;

--
-- TOC entry 228 (class 1259 OID 16468)
-- Name: livros; Type: TABLE; Schema: public; Owner: admin
--

CREATE TABLE public.livros (
    codl bigint NOT NULL,
    titulo character varying(40) NOT NULL,
    valor numeric(8,2) DEFAULT '0'::numeric NOT NULL,
    editora character varying(40) NOT NULL,
    edicao integer NOT NULL,
    ano_publicacao character varying(4) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.livros OWNER TO admin;

--
-- TOC entry 235 (class 1259 OID 16519)
-- Name: biblioteca_view; Type: VIEW; Schema: public; Owner: admin
--

CREATE VIEW public.biblioteca_view AS
 SELECT a.cod_au AS autor_id,
    a.nome AS autor_nome,
    count(DISTINCT l.codl) AS total_livros,
    string_agg(DISTINCT (l.titulo)::text, '; '::text) AS livros_do_autor,
    string_agg(DISTINCT (s.descricao)::text, '; '::text) AS assuntos_dos_livros
   FROM ((((public.autores a
     JOIN public.livro_autor la ON ((a.cod_au = la.autor_cod_au)))
     JOIN public.livros l ON ((la.livro_codl = l.codl)))
     LEFT JOIN public.livro_assunto ls ON ((l.codl = ls.livro_codl)))
     LEFT JOIN public.assuntos s ON ((ls.assunto_cod_as = s.cod_as)))
  GROUP BY a.cod_au, a.nome
  ORDER BY a.nome;


ALTER TABLE public.biblioteca_view OWNER TO admin;

--
-- TOC entry 220 (class 1259 OID 16424)
-- Name: cache; Type: TABLE; Schema: public; Owner: admin
--

CREATE TABLE public.cache (
    key character varying(255) NOT NULL,
    value text NOT NULL,
    expiration integer NOT NULL
);


ALTER TABLE public.cache OWNER TO admin;

--
-- TOC entry 221 (class 1259 OID 16431)
-- Name: cache_locks; Type: TABLE; Schema: public; Owner: admin
--

CREATE TABLE public.cache_locks (
    key character varying(255) NOT NULL,
    owner character varying(255) NOT NULL,
    expiration integer NOT NULL
);


ALTER TABLE public.cache_locks OWNER TO admin;

--
-- TOC entry 226 (class 1259 OID 16456)
-- Name: failed_jobs; Type: TABLE; Schema: public; Owner: admin
--

CREATE TABLE public.failed_jobs (
    id bigint NOT NULL,
    uuid character varying(255) NOT NULL,
    connection text NOT NULL,
    queue text NOT NULL,
    payload text NOT NULL,
    exception text NOT NULL,
    failed_at timestamp(0) without time zone DEFAULT CURRENT_TIMESTAMP NOT NULL
);


ALTER TABLE public.failed_jobs OWNER TO admin;

--
-- TOC entry 225 (class 1259 OID 16455)
-- Name: failed_jobs_id_seq; Type: SEQUENCE; Schema: public; Owner: admin
--

CREATE SEQUENCE public.failed_jobs_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.failed_jobs_id_seq OWNER TO admin;

--
-- TOC entry 3481 (class 0 OID 0)
-- Dependencies: 225
-- Name: failed_jobs_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: admin
--

ALTER SEQUENCE public.failed_jobs_id_seq OWNED BY public.failed_jobs.id;


--
-- TOC entry 224 (class 1259 OID 16448)
-- Name: job_batches; Type: TABLE; Schema: public; Owner: admin
--

CREATE TABLE public.job_batches (
    id character varying(255) NOT NULL,
    name character varying(255) NOT NULL,
    total_jobs integer NOT NULL,
    pending_jobs integer NOT NULL,
    failed_jobs integer NOT NULL,
    failed_job_ids text NOT NULL,
    options text,
    cancelled_at integer,
    created_at integer NOT NULL,
    finished_at integer
);


ALTER TABLE public.job_batches OWNER TO admin;

--
-- TOC entry 223 (class 1259 OID 16439)
-- Name: jobs; Type: TABLE; Schema: public; Owner: admin
--

CREATE TABLE public.jobs (
    id bigint NOT NULL,
    queue character varying(255) NOT NULL,
    payload text NOT NULL,
    attempts smallint NOT NULL,
    reserved_at integer,
    available_at integer NOT NULL,
    created_at integer NOT NULL
);


ALTER TABLE public.jobs OWNER TO admin;

--
-- TOC entry 222 (class 1259 OID 16438)
-- Name: jobs_id_seq; Type: SEQUENCE; Schema: public; Owner: admin
--

CREATE SEQUENCE public.jobs_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.jobs_id_seq OWNER TO admin;

--
-- TOC entry 3482 (class 0 OID 0)
-- Dependencies: 222
-- Name: jobs_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: admin
--

ALTER SEQUENCE public.jobs_id_seq OWNED BY public.jobs.id;


--
-- TOC entry 227 (class 1259 OID 16467)
-- Name: livros_codl_seq; Type: SEQUENCE; Schema: public; Owner: admin
--

CREATE SEQUENCE public.livros_codl_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.livros_codl_seq OWNER TO admin;

--
-- TOC entry 3483 (class 0 OID 0)
-- Dependencies: 227
-- Name: livros_codl_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: admin
--

ALTER SEQUENCE public.livros_codl_seq OWNED BY public.livros.codl;


--
-- TOC entry 215 (class 1259 OID 16391)
-- Name: migrations; Type: TABLE; Schema: public; Owner: admin
--

CREATE TABLE public.migrations (
    id integer NOT NULL,
    migration character varying(255) NOT NULL,
    batch integer NOT NULL
);


ALTER TABLE public.migrations OWNER TO admin;

--
-- TOC entry 214 (class 1259 OID 16390)
-- Name: migrations_id_seq; Type: SEQUENCE; Schema: public; Owner: admin
--

CREATE SEQUENCE public.migrations_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.migrations_id_seq OWNER TO admin;

--
-- TOC entry 3484 (class 0 OID 0)
-- Dependencies: 214
-- Name: migrations_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: admin
--

ALTER SEQUENCE public.migrations_id_seq OWNED BY public.migrations.id;


--
-- TOC entry 218 (class 1259 OID 16408)
-- Name: password_reset_tokens; Type: TABLE; Schema: public; Owner: admin
--

CREATE TABLE public.password_reset_tokens (
    email character varying(255) NOT NULL,
    token character varying(255) NOT NULL,
    created_at timestamp(0) without time zone
);


ALTER TABLE public.password_reset_tokens OWNER TO admin;

--
-- TOC entry 219 (class 1259 OID 16415)
-- Name: sessions; Type: TABLE; Schema: public; Owner: admin
--

CREATE TABLE public.sessions (
    id character varying(255) NOT NULL,
    user_id bigint,
    ip_address character varying(45),
    user_agent text,
    payload text NOT NULL,
    last_activity integer NOT NULL
);


ALTER TABLE public.sessions OWNER TO admin;

--
-- TOC entry 217 (class 1259 OID 16398)
-- Name: users; Type: TABLE; Schema: public; Owner: admin
--

CREATE TABLE public.users (
    id bigint NOT NULL,
    name character varying(255) NOT NULL,
    email character varying(255) NOT NULL,
    email_verified_at timestamp(0) without time zone,
    password character varying(255) NOT NULL,
    remember_token character varying(100),
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.users OWNER TO admin;

--
-- TOC entry 216 (class 1259 OID 16397)
-- Name: users_id_seq; Type: SEQUENCE; Schema: public; Owner: admin
--

CREATE SEQUENCE public.users_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.users_id_seq OWNER TO admin;

--
-- TOC entry 3485 (class 0 OID 0)
-- Dependencies: 216
-- Name: users_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: admin
--

ALTER SEQUENCE public.users_id_seq OWNED BY public.users.id;


--
-- TOC entry 3269 (class 2604 OID 16486)
-- Name: assuntos cod_as; Type: DEFAULT; Schema: public; Owner: admin
--

ALTER TABLE ONLY public.assuntos ALTER COLUMN cod_as SET DEFAULT nextval('public.assuntos_cod_as_seq'::regclass);


--
-- TOC entry 3268 (class 2604 OID 16479)
-- Name: autores cod_au; Type: DEFAULT; Schema: public; Owner: admin
--

ALTER TABLE ONLY public.autores ALTER COLUMN cod_au SET DEFAULT nextval('public.autores_cod_au_seq'::regclass);


--
-- TOC entry 3264 (class 2604 OID 16459)
-- Name: failed_jobs id; Type: DEFAULT; Schema: public; Owner: admin
--

ALTER TABLE ONLY public.failed_jobs ALTER COLUMN id SET DEFAULT nextval('public.failed_jobs_id_seq'::regclass);


--
-- TOC entry 3263 (class 2604 OID 16442)
-- Name: jobs id; Type: DEFAULT; Schema: public; Owner: admin
--

ALTER TABLE ONLY public.jobs ALTER COLUMN id SET DEFAULT nextval('public.jobs_id_seq'::regclass);


--
-- TOC entry 3266 (class 2604 OID 16471)
-- Name: livros codl; Type: DEFAULT; Schema: public; Owner: admin
--

ALTER TABLE ONLY public.livros ALTER COLUMN codl SET DEFAULT nextval('public.livros_codl_seq'::regclass);


--
-- TOC entry 3261 (class 2604 OID 16394)
-- Name: migrations id; Type: DEFAULT; Schema: public; Owner: admin
--

ALTER TABLE ONLY public.migrations ALTER COLUMN id SET DEFAULT nextval('public.migrations_id_seq'::regclass);


--
-- TOC entry 3262 (class 2604 OID 16401)
-- Name: users id; Type: DEFAULT; Schema: public; Owner: admin
--

ALTER TABLE ONLY public.users ALTER COLUMN id SET DEFAULT nextval('public.users_id_seq'::regclass);


--
-- TOC entry 3470 (class 0 OID 16483)
-- Dependencies: 232
-- Data for Name: assuntos; Type: TABLE DATA; Schema: public; Owner: admin
--

COPY public.assuntos (cod_as, descricao, created_at, updated_at) FROM stdin;
1	Ficção	2025-06-05 01:51:42	2025-06-05 01:51:42
2	Técnico	2025-06-05 01:51:42	2025-06-05 01:51:42
3	Biografia	2025-06-05 01:51:42	2025-06-05 01:51:42
4	História	2025-06-05 01:51:42	2025-06-05 01:51:42
\.


--
-- TOC entry 3468 (class 0 OID 16476)
-- Dependencies: 230
-- Data for Name: autores; Type: TABLE DATA; Schema: public; Owner: admin
--

COPY public.autores (cod_au, nome, created_at, updated_at) FROM stdin;
1	Machado de Assis	2025-06-05 01:51:42	2025-06-05 01:51:42
2	Clarice Lispector	2025-06-05 01:51:42	2025-06-05 01:51:42
3	J.K. Rowling	2025-06-05 01:51:42	2025-06-05 01:51:42
4	George Orwell	2025-06-05 01:51:42	2025-06-05 01:51:42
\.


--
-- TOC entry 3458 (class 0 OID 16424)
-- Dependencies: 220
-- Data for Name: cache; Type: TABLE DATA; Schema: public; Owner: admin
--

COPY public.cache (key, value, expiration) FROM stdin;
\.


--
-- TOC entry 3459 (class 0 OID 16431)
-- Dependencies: 221
-- Data for Name: cache_locks; Type: TABLE DATA; Schema: public; Owner: admin
--

COPY public.cache_locks (key, owner, expiration) FROM stdin;
\.


--
-- TOC entry 3464 (class 0 OID 16456)
-- Dependencies: 226
-- Data for Name: failed_jobs; Type: TABLE DATA; Schema: public; Owner: admin
--

COPY public.failed_jobs (id, uuid, connection, queue, payload, exception, failed_at) FROM stdin;
\.


--
-- TOC entry 3462 (class 0 OID 16448)
-- Dependencies: 224
-- Data for Name: job_batches; Type: TABLE DATA; Schema: public; Owner: admin
--

COPY public.job_batches (id, name, total_jobs, pending_jobs, failed_jobs, failed_job_ids, options, cancelled_at, created_at, finished_at) FROM stdin;
\.


--
-- TOC entry 3461 (class 0 OID 16439)
-- Dependencies: 223
-- Data for Name: jobs; Type: TABLE DATA; Schema: public; Owner: admin
--

COPY public.jobs (id, queue, payload, attempts, reserved_at, available_at, created_at) FROM stdin;
\.


--
-- TOC entry 3472 (class 0 OID 16504)
-- Dependencies: 234
-- Data for Name: livro_assunto; Type: TABLE DATA; Schema: public; Owner: admin
--

COPY public.livro_assunto (livro_codl, assunto_cod_as) FROM stdin;
1	1
2	1
3	1
4	1
\.


--
-- TOC entry 3471 (class 0 OID 16489)
-- Dependencies: 233
-- Data for Name: livro_autor; Type: TABLE DATA; Schema: public; Owner: admin
--

COPY public.livro_autor (livro_codl, autor_cod_au) FROM stdin;
1	1
2	2
3	3
4	4
\.


--
-- TOC entry 3466 (class 0 OID 16468)
-- Dependencies: 228
-- Data for Name: livros; Type: TABLE DATA; Schema: public; Owner: admin
--

COPY public.livros (codl, titulo, valor, editora, edicao, ano_publicacao, created_at, updated_at) FROM stdin;
1	Dom Casmurro	35.99	Companhia das Letras	1	1899	2025-06-05 01:51:42	2025-06-05 01:51:42
2	A Hora da Estrela	59.50	Rocco	3	1977	2025-06-05 01:51:42	2025-06-05 01:51:42
3	Harry Potter	29.90	Bloomsbury	1	1997	2025-06-05 01:51:42	2025-06-05 01:51:42
4	1984	99.90	Penguin	2	1949	2025-06-05 01:51:42	2025-06-05 01:51:42
\.


--
-- TOC entry 3453 (class 0 OID 16391)
-- Dependencies: 215
-- Data for Name: migrations; Type: TABLE DATA; Schema: public; Owner: admin
--

COPY public.migrations (id, migration, batch) FROM stdin;
1	0001_01_01_000000_create_users_table	1
2	0001_01_01_000001_create_cache_table	1
3	0001_01_01_000002_create_jobs_table	1
4	2025_05_29_230922_create_livros_table	1
5	2025_05_29_233641_create_autores_table	1
6	2025_05_29_233944_create_assuntos_table	1
7	2025_05_29_234151_create_livro_autor_table	1
8	2025_05_29_235317_create_livro_assunto_table	1
9	2025_06_02_030709_create_biblioteca_view	1
\.


--
-- TOC entry 3456 (class 0 OID 16408)
-- Dependencies: 218
-- Data for Name: password_reset_tokens; Type: TABLE DATA; Schema: public; Owner: admin
--

COPY public.password_reset_tokens (email, token, created_at) FROM stdin;
\.


--
-- TOC entry 3457 (class 0 OID 16415)
-- Dependencies: 219
-- Data for Name: sessions; Type: TABLE DATA; Schema: public; Owner: admin
--

COPY public.sessions (id, user_id, ip_address, user_agent, payload, last_activity) FROM stdin;
\.


--
-- TOC entry 3455 (class 0 OID 16398)
-- Dependencies: 217
-- Data for Name: users; Type: TABLE DATA; Schema: public; Owner: admin
--

COPY public.users (id, name, email, email_verified_at, password, remember_token, created_at, updated_at) FROM stdin;
\.


--
-- TOC entry 3486 (class 0 OID 0)
-- Dependencies: 231
-- Name: assuntos_cod_as_seq; Type: SEQUENCE SET; Schema: public; Owner: admin
--

SELECT pg_catalog.setval('public.assuntos_cod_as_seq', 1, false);


--
-- TOC entry 3487 (class 0 OID 0)
-- Dependencies: 229
-- Name: autores_cod_au_seq; Type: SEQUENCE SET; Schema: public; Owner: admin
--

SELECT pg_catalog.setval('public.autores_cod_au_seq', 1, false);


--
-- TOC entry 3488 (class 0 OID 0)
-- Dependencies: 225
-- Name: failed_jobs_id_seq; Type: SEQUENCE SET; Schema: public; Owner: admin
--

SELECT pg_catalog.setval('public.failed_jobs_id_seq', 1, false);


--
-- TOC entry 3489 (class 0 OID 0)
-- Dependencies: 222
-- Name: jobs_id_seq; Type: SEQUENCE SET; Schema: public; Owner: admin
--

SELECT pg_catalog.setval('public.jobs_id_seq', 1, false);


--
-- TOC entry 3490 (class 0 OID 0)
-- Dependencies: 227
-- Name: livros_codl_seq; Type: SEQUENCE SET; Schema: public; Owner: admin
--

SELECT pg_catalog.setval('public.livros_codl_seq', 1, false);


--
-- TOC entry 3491 (class 0 OID 0)
-- Dependencies: 214
-- Name: migrations_id_seq; Type: SEQUENCE SET; Schema: public; Owner: admin
--

SELECT pg_catalog.setval('public.migrations_id_seq', 9, true);


--
-- TOC entry 3492 (class 0 OID 0)
-- Dependencies: 216
-- Name: users_id_seq; Type: SEQUENCE SET; Schema: public; Owner: admin
--

SELECT pg_catalog.setval('public.users_id_seq', 1, false);


--
-- TOC entry 3300 (class 2606 OID 16488)
-- Name: assuntos assuntos_pkey; Type: CONSTRAINT; Schema: public; Owner: admin
--

ALTER TABLE ONLY public.assuntos
    ADD CONSTRAINT assuntos_pkey PRIMARY KEY (cod_as);


--
-- TOC entry 3298 (class 2606 OID 16481)
-- Name: autores autores_pkey; Type: CONSTRAINT; Schema: public; Owner: admin
--

ALTER TABLE ONLY public.autores
    ADD CONSTRAINT autores_pkey PRIMARY KEY (cod_au);


--
-- TOC entry 3285 (class 2606 OID 16437)
-- Name: cache_locks cache_locks_pkey; Type: CONSTRAINT; Schema: public; Owner: admin
--

ALTER TABLE ONLY public.cache_locks
    ADD CONSTRAINT cache_locks_pkey PRIMARY KEY (key);


--
-- TOC entry 3283 (class 2606 OID 16430)
-- Name: cache cache_pkey; Type: CONSTRAINT; Schema: public; Owner: admin
--

ALTER TABLE ONLY public.cache
    ADD CONSTRAINT cache_pkey PRIMARY KEY (key);


--
-- TOC entry 3292 (class 2606 OID 16464)
-- Name: failed_jobs failed_jobs_pkey; Type: CONSTRAINT; Schema: public; Owner: admin
--

ALTER TABLE ONLY public.failed_jobs
    ADD CONSTRAINT failed_jobs_pkey PRIMARY KEY (id);


--
-- TOC entry 3294 (class 2606 OID 16466)
-- Name: failed_jobs failed_jobs_uuid_unique; Type: CONSTRAINT; Schema: public; Owner: admin
--

ALTER TABLE ONLY public.failed_jobs
    ADD CONSTRAINT failed_jobs_uuid_unique UNIQUE (uuid);


--
-- TOC entry 3290 (class 2606 OID 16454)
-- Name: job_batches job_batches_pkey; Type: CONSTRAINT; Schema: public; Owner: admin
--

ALTER TABLE ONLY public.job_batches
    ADD CONSTRAINT job_batches_pkey PRIMARY KEY (id);


--
-- TOC entry 3287 (class 2606 OID 16446)
-- Name: jobs jobs_pkey; Type: CONSTRAINT; Schema: public; Owner: admin
--

ALTER TABLE ONLY public.jobs
    ADD CONSTRAINT jobs_pkey PRIMARY KEY (id);


--
-- TOC entry 3304 (class 2606 OID 16518)
-- Name: livro_assunto livro_assunto_pkey; Type: CONSTRAINT; Schema: public; Owner: admin
--

ALTER TABLE ONLY public.livro_assunto
    ADD CONSTRAINT livro_assunto_pkey PRIMARY KEY (livro_codl, assunto_cod_as);


--
-- TOC entry 3302 (class 2606 OID 16503)
-- Name: livro_autor livro_autor_pkey; Type: CONSTRAINT; Schema: public; Owner: admin
--

ALTER TABLE ONLY public.livro_autor
    ADD CONSTRAINT livro_autor_pkey PRIMARY KEY (livro_codl, autor_cod_au);


--
-- TOC entry 3296 (class 2606 OID 16474)
-- Name: livros livros_pkey; Type: CONSTRAINT; Schema: public; Owner: admin
--

ALTER TABLE ONLY public.livros
    ADD CONSTRAINT livros_pkey PRIMARY KEY (codl);


--
-- TOC entry 3271 (class 2606 OID 16396)
-- Name: migrations migrations_pkey; Type: CONSTRAINT; Schema: public; Owner: admin
--

ALTER TABLE ONLY public.migrations
    ADD CONSTRAINT migrations_pkey PRIMARY KEY (id);


--
-- TOC entry 3277 (class 2606 OID 16414)
-- Name: password_reset_tokens password_reset_tokens_pkey; Type: CONSTRAINT; Schema: public; Owner: admin
--

ALTER TABLE ONLY public.password_reset_tokens
    ADD CONSTRAINT password_reset_tokens_pkey PRIMARY KEY (email);


--
-- TOC entry 3280 (class 2606 OID 16421)
-- Name: sessions sessions_pkey; Type: CONSTRAINT; Schema: public; Owner: admin
--

ALTER TABLE ONLY public.sessions
    ADD CONSTRAINT sessions_pkey PRIMARY KEY (id);


--
-- TOC entry 3273 (class 2606 OID 16407)
-- Name: users users_email_unique; Type: CONSTRAINT; Schema: public; Owner: admin
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_email_unique UNIQUE (email);


--
-- TOC entry 3275 (class 2606 OID 16405)
-- Name: users users_pkey; Type: CONSTRAINT; Schema: public; Owner: admin
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_pkey PRIMARY KEY (id);


--
-- TOC entry 3288 (class 1259 OID 16447)
-- Name: jobs_queue_index; Type: INDEX; Schema: public; Owner: admin
--

CREATE INDEX jobs_queue_index ON public.jobs USING btree (queue);


--
-- TOC entry 3278 (class 1259 OID 16423)
-- Name: sessions_last_activity_index; Type: INDEX; Schema: public; Owner: admin
--

CREATE INDEX sessions_last_activity_index ON public.sessions USING btree (last_activity);


--
-- TOC entry 3281 (class 1259 OID 16422)
-- Name: sessions_user_id_index; Type: INDEX; Schema: public; Owner: admin
--

CREATE INDEX sessions_user_id_index ON public.sessions USING btree (user_id);


--
-- TOC entry 3307 (class 2606 OID 16512)
-- Name: livro_assunto livro_assunto_assunto_cod_as_foreign; Type: FK CONSTRAINT; Schema: public; Owner: admin
--

ALTER TABLE ONLY public.livro_assunto
    ADD CONSTRAINT livro_assunto_assunto_cod_as_foreign FOREIGN KEY (assunto_cod_as) REFERENCES public.assuntos(cod_as) ON DELETE CASCADE;


--
-- TOC entry 3308 (class 2606 OID 16507)
-- Name: livro_assunto livro_assunto_livro_codl_foreign; Type: FK CONSTRAINT; Schema: public; Owner: admin
--

ALTER TABLE ONLY public.livro_assunto
    ADD CONSTRAINT livro_assunto_livro_codl_foreign FOREIGN KEY (livro_codl) REFERENCES public.livros(codl) ON DELETE CASCADE;


--
-- TOC entry 3305 (class 2606 OID 16497)
-- Name: livro_autor livro_autor_autor_cod_au_foreign; Type: FK CONSTRAINT; Schema: public; Owner: admin
--

ALTER TABLE ONLY public.livro_autor
    ADD CONSTRAINT livro_autor_autor_cod_au_foreign FOREIGN KEY (autor_cod_au) REFERENCES public.autores(cod_au) ON DELETE CASCADE;


--
-- TOC entry 3306 (class 2606 OID 16492)
-- Name: livro_autor livro_autor_livro_codl_foreign; Type: FK CONSTRAINT; Schema: public; Owner: admin
--

ALTER TABLE ONLY public.livro_autor
    ADD CONSTRAINT livro_autor_livro_codl_foreign FOREIGN KEY (livro_codl) REFERENCES public.livros(codl) ON DELETE CASCADE;


-- Completed on 2025-06-05 02:02:48 UTC

--
-- PostgreSQL database dump complete
--

--
-- Database "postgres" dump
--

\connect postgres

--
-- PostgreSQL database dump
--

-- Dumped from database version 15.13 (Debian 15.13-1.pgdg120+1)
-- Dumped by pg_dump version 15.13

-- Started on 2025-06-05 02:02:48 UTC

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

-- Completed on 2025-06-05 02:02:48 UTC

--
-- PostgreSQL database dump complete
--

-- Completed on 2025-06-05 02:02:48 UTC

--
-- PostgreSQL database cluster dump complete
--

