-- ----------------------------
-- Table structure for accounts
-- ----------------------------

DROP SEQUENCE users_id_seq;

CREATE SEQUENCE users_id_seq
  INCREMENT 1
  MINVALUE 1
  MAXVALUE 9223372036854775807
  START 1
  CACHE 1;
ALTER TABLE users_id_seq
  OWNER TO postgres;

DROP TABLE users;
CREATE TABLE users
(
  id serial NOT NULL,
  username character varying(40) NOT NULL,
  password character varying(40) NOT NULL,
  session character varying(255) DEFAULT NULL::character varying,
  server character varying(255) DEFAULT NULL::character varying,
  CONSTRAINT users_pkey PRIMARY KEY (id )
)
WITH (
  OIDS=FALSE
);
ALTER TABLE users
  OWNER TO postgres;
ALTER TABLE users ALTER COLUMN id SET DEFAULT nextval('users_id_seq'::regclass);