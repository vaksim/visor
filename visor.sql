--
-- PostgreSQL database dump
--

SET statement_timeout = 0;
SET lock_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;

--
-- Name: visor; Type: DATABASE; Schema: -; Owner: visor
--

CREATE DATABASE visor WITH TEMPLATE = template0 ENCODING = 'UTF8' LC_COLLATE = 'ru_RU.UTF-8' LC_CTYPE = 'ru_RU.UTF-8';


ALTER DATABASE visor OWNER TO visor;

\connect visor

SET statement_timeout = 0;
SET lock_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;

--
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET search_path = public, pg_catalog;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: locomotives; Type: TABLE; Schema: public; Owner: visor; Tablespace: 
--

CREATE TABLE locomotives (
    id integer NOT NULL,
    locomotive_names_id integer,
    number text NOT NULL

);


ALTER TABLE public.locomotives OWNER TO visor;

--
-- Name: locomotives_id_seq; Type: SEQUENCE; Schema: public; Owner: visor
--

CREATE SEQUENCE locomotives_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.locomotives_id_seq OWNER TO visor;

--
-- Name: locomotives_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: visor
--

ALTER SEQUENCE locomotives_id_seq OWNED BY locomotives.id;


--
-- Name: locomotive_names; Type: TABLE; Schema: public; Owner: visor; Tablespace: 
--

CREATE TABLE locomotive_names (
    id integer NOT NULL,
    name text NOT NULL
);


ALTER TABLE public.locomotive_names OWNER TO visor;

--
-- Name: locomotive_names_id_seq; Type: SEQUENCE; Schema: public; Owner: visor
--

CREATE SEQUENCE locomotive_names_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.locomotive_names_id_seq OWNER TO visor;

--
-- Name: locomotive_names_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: visor
--

ALTER SEQUENCE locomotive_names_id_seq OWNED BY locomotive_names.id;


--
-- Name: repairs; Type: TABLE; Schema: public; Owner: visor; Tablespace: 
--

CREATE TABLE repairs (
    id integer NOT NULL,
    locomotives_id integer NOT NULL,
    date_beginning date,
    date_ending date,
    subdivisions_id integer
);


ALTER TABLE public.repairs OWNER TO visor;

--
-- Name: repairs_id_seq; Type: SEQUENCE; Schema: public; Owner: visor
--

CREATE SEQUENCE repairs_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.repairs_id_seq OWNER TO visor;

--
-- Name: repairs_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: visor
--

ALTER SEQUENCE repairs_id_seq OWNED BY repairs.id;


--
-- Name: subdivisions; Type: TABLE; Schema: public; Owner: visor; Tablespace: 
--

CREATE TABLE subdivisions (
    id integer NOT NULL,
    name text NOT NULL
);


ALTER TABLE public.subdivisions OWNER TO visor;

--
-- Name: subdivisions_id_seq; Type: SEQUENCE; Schema: public; Owner: visor
--

CREATE SEQUENCE subdivisions_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.subdivisions_id_seq OWNER TO visor;

--
-- Name: subdivisions_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: visor
--

ALTER SEQUENCE subdivisions_id_seq OWNED BY subdivisions.id;


--
-- Name: users; Type: TABLE; Schema: public; Owner: visor; Tablespace: 
--

CREATE TABLE users (
    id integer NOT NULL,
    name text NOT NULL,
    password text NOT NULL,
    full_name text,
    job_title text
);


ALTER TABLE public.users OWNER TO visor;

--
-- Name: users_id_seq; Type: SEQUENCE; Schema: public; Owner: visor
--

CREATE SEQUENCE users_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.users_id_seq OWNER TO visor;

--
-- Name: users_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: visor
--

ALTER SEQUENCE users_id_seq OWNED BY users.id;


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: visor
--

ALTER TABLE ONLY locomotives ALTER COLUMN id SET DEFAULT nextval('locomotives_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: visor
--

ALTER TABLE ONLY locomotive_names ALTER COLUMN id SET DEFAULT nextval('locomotive_names_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: visor
--

ALTER TABLE ONLY repairs ALTER COLUMN id SET DEFAULT nextval('repairs_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: visor
--

ALTER TABLE ONLY subdivisions ALTER COLUMN id SET DEFAULT nextval('subdivisions_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: visor
--

ALTER TABLE ONLY users ALTER COLUMN id SET DEFAULT nextval('users_id_seq'::regclass);


--
-- Data for Name: locomotives; Type: TABLE DATA; Schema: public; Owner: visor
--

COPY locomotives (id, locomotive_names_id, number) FROM stdin;
2	1	666666
1	1	123321
\.


--
-- Name: locomotives_id_seq; Type: SEQUENCE SET; Schema: public; Owner: visor
--

SELECT pg_catalog.setval('locomotives_id_seq', 2, true);


--
-- Data for Name: locomotive_names; Type: TABLE DATA; Schema: public; Owner: visor
--

COPY locomotive_names (id, name) FROM stdin;
1	ПБ
\.


--
-- Name: locomotive_names_id_seq; Type: SEQUENCE SET; Schema: public; Owner: visor
--

SELECT pg_catalog.setval('locomotive_names_id_seq', 1, true);


--
-- Data for Name: repairs; Type: TABLE DATA; Schema: public; Owner: visor
--

COPY repairs (id, locomotives_id, date_beginning, date_ending, subdivisions_id) FROM stdin;
1	1	2014-12-12	2015-02-15	1
\.


--
-- Name: repairs_id_seq; Type: SEQUENCE SET; Schema: public; Owner: visor
--

SELECT pg_catalog.setval('repairs_id_seq', 1, true);


--
-- Data for Name: subdivisions; Type: TABLE DATA; Schema: public; Owner: visor
--

COPY subdivisions (id, name) FROM stdin;
1	Черепаново
\.


--
-- Name: subdivisions_id_seq; Type: SEQUENCE SET; Schema: public; Owner: visor
--

SELECT pg_catalog.setval('subdivisions_id_seq', 1, true);


--
-- Data for Name: users; Type: TABLE DATA; Schema: public; Owner: visor
--

COPY users (id, name, password, full_name, job_title) FROM stdin;
1	maximus	123	Васюк Максим Анатольевич	Ведущий инженер по ОВТ
\.


--
-- Name: users_id_seq; Type: SEQUENCE SET; Schema: public; Owner: visor
--

SELECT pg_catalog.setval('users_id_seq', 1, true);


--
-- Name: locomotives_id_pkey; Type: CONSTRAINT; Schema: public; Owner: visor; Tablespace: 
--

ALTER TABLE ONLY locomotives
    ADD CONSTRAINT locomotives_id_pkey PRIMARY KEY (id);


--
-- Name: locomotive_names_id_pkey; Type: CONSTRAINT; Schema: public; Owner: visor; Tablespace: 
--

ALTER TABLE ONLY locomotive_names
    ADD CONSTRAINT locomotive_names_id_pkey PRIMARY KEY (id);


--
-- Name: repairs_id_pkey; Type: CONSTRAINT; Schema: public; Owner: visor; Tablespace: 
--

ALTER TABLE ONLY repairs
    ADD CONSTRAINT repairs_id_pkey PRIMARY KEY (id);


--
-- Name: subdivisions_id_pkey; Type: CONSTRAINT; Schema: public; Owner: visor; Tablespace: 
--

ALTER TABLE ONLY subdivisions
    ADD CONSTRAINT subdivisions_id_pkey PRIMARY KEY (id);


--
-- Name: users_id_pkey; Type: CONSTRAINT; Schema: public; Owner: visor; Tablespace: 
--

ALTER TABLE ONLY users
    ADD CONSTRAINT users_id_pkey PRIMARY KEY (id);


--
-- Name: public; Type: ACL; Schema: -; Owner: visor
--

REVOKE ALL ON SCHEMA public FROM PUBLIC;
REVOKE ALL ON SCHEMA public FROM visor;
GRANT ALL ON SCHEMA public TO visor;
GRANT ALL ON SCHEMA public TO PUBLIC;


--
-- PostgreSQL database dump complete
--

