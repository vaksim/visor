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
-- Name: visor; Type: DATABASE; Schema: -; Owner: chrbu01
--

CREATE DATABASE visor WITH TEMPLATE = template0 ENCODING = 'UTF8' LC_COLLATE = 'ru_RU.UTF-8' LC_CTYPE = 'ru_RU.UTF-8';


ALTER DATABASE visor OWNER TO chrbu01;

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
-- Name: locomotive_name; Type: TABLE; Schema: public; Owner: chrbu01; Tablespace: 
--

CREATE TABLE locomotive_name (
    id integer NOT NULL,
    name text NOT NULL
);


ALTER TABLE public.locomotive_name OWNER TO chrbu01;

--
-- Name: locomotive_name_id_seq; Type: SEQUENCE; Schema: public; Owner: chrbu01
--

CREATE SEQUENCE locomotive_name_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.locomotive_name_id_seq OWNER TO chrbu01;

--
-- Name: locomotive_name_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: chrbu01
--

ALTER SEQUENCE locomotive_name_id_seq OWNED BY locomotive_name.id;


--
-- Name: locomotive; Type: TABLE; Schema: public; Owner: chrbu01; Tablespace: 
--

CREATE TABLE locomotive (
    id integer NOT NULL,
    name text NOT NULL,
    number text NOT NULL,
    locomotive_name_id integer
);


ALTER TABLE public.locomotive OWNER TO chrbu01;

--
-- Name: locomotive_id_seq; Type: SEQUENCE; Schema: public; Owner: chrbu01
--

CREATE SEQUENCE locomotive_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.locomotives_id_seq OWNER TO chrbu01;

--
-- Name: locomotive_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: chrbu01
--

ALTER SEQUENCE locomotive_id_seq OWNED BY locomotive.id;


--
-- Name: repair; Type: TABLE; Schema: public; Owner: chrbu01; Tablespace: 
--

CREATE TABLE repair (
    id integer NOT NULL,
    locomotive_id integer NOT NULL,
    date_beginning date,
    date_ending date
);


ALTER TABLE public.repair OWNER TO chrbu01;

--
-- Name: repair_id_seq; Type: SEQUENCE; Schema: public; Owner: chrbu01
--

CREATE SEQUENCE repair_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.repair_id_seq OWNER TO chrbu01;

--
-- Name: repair_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: chrbu01
--

ALTER SEQUENCE repair_id_seq OWNED BY repair.id;


--
-- Name: users; Type: TABLE; Schema: public; Owner: chrbu01; Tablespace: 
--

CREATE TABLE users (
    id integer NOT NULL,
    name text NOT NULL,
    password text NOT NULL,
    full_name text,
    job_title text
);


ALTER TABLE public.users OWNER TO chrbu01;

--
-- Name: users_id_seq; Type: SEQUENCE; Schema: public; Owner: chrbu01
--

CREATE SEQUENCE users_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.users_id_seq OWNER TO chrbu01;

--
-- Name: users_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: chrbu01
--

ALTER SEQUENCE users_id_seq OWNED BY users.id;


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: chrbu01
--

ALTER TABLE ONLY locomotive_name ALTER COLUMN id SET DEFAULT nextval('locomotive_name_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: chrbu01
--

ALTER TABLE ONLY locomotive ALTER COLUMN id SET DEFAULT nextval('locomotive_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: chrbu01
--

ALTER TABLE ONLY repair ALTER COLUMN id SET DEFAULT nextval('repair_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: chrbu01
--

ALTER TABLE ONLY users ALTER COLUMN id SET DEFAULT nextval('users_id_seq'::regclass);


--
-- Data for Name: locomotive_name; Type: TABLE DATA; Schema: public; Owner: chrbu01
--

COPY locomotive_name (id, name) FROM stdin;
1	ПБ
\.


--
-- Name: locomotive_name_id_seq; Type: SEQUENCE SET; Schema: public; Owner: chrbu01
--

SELECT pg_catalog.setval('locomotive_name_id_seq', 1, true);


--
-- Data for Name: locomotive; Type: TABLE DATA; Schema: public; Owner: chrbu01
--

COPY locomotive (id, name, number, locomotive_name_id) FROM stdin;
2	CM-3	666666	\N
1	ПОМ-7	123321	1
\.


--
-- Name: locomotive_id_seq; Type: SEQUENCE SET; Schema: public; Owner: chrbu01
--

SELECT pg_catalog.setval('locomotive_id_seq', 2, true);


--
-- Data for Name: repair; Type: TABLE DATA; Schema: public; Owner: chrbu01
--

COPY repair (id, locomotive_id, date_beginning, date_ending) FROM stdin;
1	1	2014-12-12	2015-02-15
\.


--
-- Name: repair_id_seq; Type: SEQUENCE SET; Schema: public; Owner: chrbu01
--

SELECT pg_catalog.setval('repair_id_seq', 1, true);


--
-- Data for Name: users; Type: TABLE DATA; Schema: public; Owner: chrbu01
--

COPY users (id, name, password, full_name, job_title) FROM stdin;
1	maximus	123	Васюк Максим Анатольевич	Ведущий инженер по ОВТ
\.


--
-- Name: users_id_seq; Type: SEQUENCE SET; Schema: public; Owner: chrbu01
--

SELECT pg_catalog.setval('users_id_seq', 1, true);


--
-- Name: locomotive_id_pkey; Type: CONSTRAINT; Schema: public; Owner: chrbu01; Tablespace: 
--

ALTER TABLE ONLY locomotive
    ADD CONSTRAINT locomotive_id_pkey PRIMARY KEY (id);


--
-- Name: locomotive_name_id_pkey; Type: CONSTRAINT; Schema: public; Owner: chrbu01; Tablespace: 
--

ALTER TABLE ONLY locomotive_name
    ADD CONSTRAINT locomotive_name_id_pkey PRIMARY KEY (id);


--
-- Name: repair_id_pkey; Type: CONSTRAINT; Schema: public; Owner: chrbu01; Tablespace: 
--

ALTER TABLE ONLY repair
    ADD CONSTRAINT repair_id_pkey PRIMARY KEY (id);


--
-- Name: users_id_pkey; Type: CONSTRAINT; Schema: public; Owner: chrbu01; Tablespace: 
--

ALTER TABLE ONLY users
    ADD CONSTRAINT users_id_pkey PRIMARY KEY (id);


--
-- Name: public; Type: ACL; Schema: -; Owner: chrbu01
--

REVOKE ALL ON SCHEMA public FROM PUBLIC;
REVOKE ALL ON SCHEMA public FROM chrbu01;
GRANT ALL ON SCHEMA public TO chrbu01;
GRANT ALL ON SCHEMA public TO PUBLIC;


--
-- PostgreSQL database dump complete
--

